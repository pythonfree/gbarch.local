<?php

interface CommentManagerInterface
{
    public function writeComment();
    public function deleteComment();
}

class User implements WriteCommentInterface, DeleteCommentInterface
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

class Guest implements WriteCommentInterface
{
    public function writeComment()
    {
        // TODO: Implement writeComment() method.
    }
}

interface WriteCommentInterface
{
    public function writeComment();
}

interface DeleteCommentInterface
{
    public function deleteComment();
}


$user = new User();
$user->writeComment();
$user->deleteComment();

$guest = new Guest();
$guest->writeComment();