<?php

    namespace App\Http\Controllers;
    
    use App\Models\Comment;
    use App\Models\Notification;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    
    class CommentController extends Controller
    {
        public function getPostComments($post_id)
        {
            $comments = Comment::with('user')->where('post_id', $post_id)->latest()->get();
            return response()->json($comments);
        }
    
        public function store(Request $request)
        {
            // Créer le commentaire
            $comment = Comment::create([
                'user_id' => $request->user_id,
                'post_id' => $request->post_id,
                'body' => $request->body,
            ]);
    
            // Créer une notification pour l'utilisateur qui a créé la publication
            $post = $comment->post;
            if ($post->user_id !== Auth::user()->id) {
                $notification = Notification::create([
                    'user_id' => $post->user_id,
                    'post_id' => $post->id,
                    'body' => 'Nouveau commentaire sur votre publication',
                ]);
            }
    
            return response()->json($comment->load('user'));
        }
        public function getNotifications()
        {
            $user = Auth::user();
            $notifications = Notification::where('user_id', $user->id)->latest()->get();
            return response()->json($notifications);
        }
        
    }
    
 

