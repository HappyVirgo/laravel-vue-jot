<?php

namespace App\Policies;

use App\User;
use App\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the contact.
     *
     * @param  \App\User  $user
     * @param  \App\Contact  $contact
     * @return mixed
     */

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Contact $contact)
    {
        //
        return $user->id == $contact->user_id;
    }

    /**
     * Determine whether the user can create contacts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the contact.
     *
     * @param  \App\User  $user
     * @param  \App\Contact  $contact
     * @return mixed
     */
    public function update(User $user, Contact $contact)
    {
        //
        return $user->id == $contact->user_id;
    }

    public function restore(User $user, Contact $contact) 
    {
        return false;
    }

    /**
     * Determine whether the user can delete the contact.
     *
     * @param  \App\User  $user
     * @param  \App\Contact  $contact
     * @return mixed
     */
    public function delete(User $user, Contact $contact)
    {
        //
        return $user->id == $contact->user_id;
    }

    public function forceDelete(User $user, Contact $contact)
    {
        return false;
    }
}
