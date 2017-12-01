<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Repositories\FeedbackRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Feedback;

class FeedbackController extends AppBaseController
{
    /** @var FeedbackRepository */
    private $feedbackRepository;

    public function __construct(FeedbackRepository $feedbackRepo)
    {
        $this->feedbackRepository = $feedbackRepo;
    }

    /**
     * Display a listing of the Feedback.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->feedbackRepository->pushCriteria(new RequestCriteria($request));
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $feedback = $this->feedbackRepository->with('user')->orderBy('updated_at', 'desc')->paginate(15);
        } else {
            $feedback = Feedback::where('user_id', $user->id)->paginate(15);
        }

        return view('feedback.index')->with('feedback', $feedback);
    }

    /**
     * Show the form for creating a new Feedback.
     *
     * @return Response
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created Feedback in storage.
     *
     * @param CreateFeedbackRequest $request
     *
     * @return Response
     */
    public function store(CreateFeedbackRequest $request)
    {
        $input = $request->only(['content']);

        if (empty($input['content'])) {
            Flash::error('Content is required');

            return redirect(route('feedback.create'));
        }
        $input['user_id'] = Auth::user()->id;

        $this->feedbackRepository->create($input);

        Flash::success('Feedback saved successfully.');

        return redirect(route('feedback.index'));
    }

    /**
     * Display the specified Feedback.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('feedback.index'));
        }

        return view('feedback.show')->with('feedback', $feedback);
    }

    /**
     * Show the form for editing the specified Feedback.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('feedback.index'));
        }

        return view('feedback.edit')->with('feedback', $feedback);
    }

    /**
     * Update the specified Feedback in storage.
     *
     * @param  int $id
     * @param UpdateFeedbackRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeedbackRequest $request)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('feedback.index'));
        }

        $user = Auth::user();

        if ($user->id == $feedback->user_id) {
            $input = $request->only(['content']);
            Flash::success('Feedback updated successfully.');
        } else {
            $input = $request->only(['reply', 'is_resolved']);
            $input['replied_user_id'] = $user->id;
            $input['replied_at'] = Carbon::now()->toDateTimeString();

            Flash::success('Feedback replied successfully.');
        }

        $this->feedbackRepository->update($input, $id);

        return redirect(route('feedback.show', ['id' => $id]));
    }

    /**
     * Remove the specified Feedback from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feedback = $this->feedbackRepository->findWithoutFail($id);

        if (empty($feedback)) {
            Flash::error('Feedback not found');

            return redirect(route('feedback.index'));
        }

        $user = Auth::user();

        if ($user->id == $feedback->user_id || $user->hasRole('admin')) {
            $this->feedbackRepository->delete($id);
            Flash::success('Feedback deleted successfully.');
            return redirect(route('feedback.index'));
        }

        abort(403);
    }
}
