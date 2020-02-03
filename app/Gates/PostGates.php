<?php

	
	namespace App\Gates;
	use Illuminate\Auth\Access\Response;


	class PostGates {
		public function allowed_users($user, $allowed) {
			// $allowed = explode(":", $allowed);
   //          $roles = $user->roles->pluck('name')->toArray();
   //          $result =  array_intersect($allowed, $roles);
   //          if($result == true)
   //              return true;
   //          else
   //              return Response::deny('You must be a super administrator.');
			return true;
		}
		public function allow_editings($user, $author) {
			$roles = $user->roles->pluck('name')->toArray();
			// if(in_array('admin', $roles) == true) {
			// 	Response::allow();
			// }elseif ($user->id === $author) {
			// 	Response::allow();
			// }else {
			// 	Response::deny("You are not authorize to edit");
			// }
			return $user->id === $author || in_array('admin', $roles) ? Response::allow() : Response::deny("You are not authorize to edit this post");

		}
		public function allow_creating($user) {
			$roles = $user->roles->pluck('name')->toArray();
			// if(in_array('admin', $roles) == true) {
			// 	Response::allow();
			// }elseif (in_array('super admin', $roles) == true) {
			// 	Response::allow();
			// }else {
			// 	Response::deny("Nikal Yaha Sy");
			// }
			// return in_array('admin', $roles) ? Response::allow() : Response::deny("Only admin/super admin can create posts");
			return true;

		}
		public function allow_deleting($user, $author) {
			$roles = $user->roles->pluck('name')->toArray();
			return $user->id === $author || in_array('admin', $roles) ? Response::allow() : Response::deny("You are not authorize to delete this post");
		}
	}