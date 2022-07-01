<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Traits\MapsModels;
use LivewireUI\Modal\ModalComponent;

class CommentModal extends ModalComponent
{
    use MapsModels;

    public array $model;

    public ?string $content = null;

    public array $comments;

    public int $totalVotes;

    /**
     * Initialize Livewire components
     *
     * @param  int  $modelId
     * @param  string  $type
     * @return void
     *
     * @throws \Exception
     */
    public function mount(int $modelId, string $type)
    {
        if ($this->canMapToComment($type, true)) {
            $model = call_user_func([$this->mapToClassName($type), 'query'])
                ->with([
                    'votes',
                    'createdBy',
                    'commentsWithReplies',
                    'commentsWithReplies.votes',
                    'commentsWithReplies.createdBy',
                ])->find($modelId);

            $model->comments->each(function (Comment $comment) {
                $this->comments[] = [
                    'id' => $comment->getKey(),
                    'user_id' => $comment->user_id,
                    'parent_id' => $comment->parent_id,
                    'created_by' => $comment->createdBy->username,
                    'created_at' => $comment->created_at->diffForHumans(),
                    'updated_at' => $comment->updated_at?->diffForHumans(),
                    'content' => $comment->content,
                ];
            });

            $this->model = [
                'id' => $model->getKey(),
                'title' => $model->title,
                'content' => $model->description,
                'created_by' => $model->createdBy->username,
                'created_at' => $model->created_at->diffForHumans(),
                'updated_at' => $model->updated_at?->diffForHumans(),
                'user_id' => $model->createdBy->id,
                'model_type' => $type,
            ];

            $this->totalVotes = $model->votes->sum('amount');
        } else {
            // TODO: Custom exception
            throw new \Exception('Model type is not commentable');
        }
    }

    public function render()
    {
        return view('livewire.comment-modal');
    }
}
