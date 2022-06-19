<?php

interface CommentManagerInterface
{
    public function writeComment();
    public function deleteComment();
}

class User implements CommentManagerInterface
{
    public function writeComment()
    {
        // TODO: Implement writeComment() method.
    }

    public function deleteComment()
    {
        // TODO: Implement deleteComment() method.
    }

}

class Guest implements CommentManagerInterface
{
    public function deleteComment()
    {
        throw new LogicException('Guest can\'t delete comment!');
    }

    public function writeComment()
    {
        // TODO: Implement writeComment() method.
    }

}