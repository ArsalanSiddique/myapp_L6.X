<?php

	
	namespace App\Gates;
	use Illuminate\Auth\Access\Response;


	class PostGates {
		public function allowed_users($user, $allowed) {
			$allowed = explode(":", $allowed);
            $roles = $user->roles->pluck('name')->toArray();
            $result =  array_intersect($allowed, $roles);
            if($result == true)
                return true;
            else
                return Response::deny('You must be a super administrator.');
		}
		public function allow_editings($user, $author) {
			return $user->id === $author;
		}
		public function allow_deleting($user, $author) {
			return $user->id === $author;
		}
	}