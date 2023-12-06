<?php

namespace App\Http\Livewire\Components\Members;

use App\Models\User;
use App\Services\Member\MemberService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class ComponentMembersForm extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    
    public $name, $email, $photo, $nisn, $password;

    protected function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'photo' => 'image',
            'nisn' => 'required',
            'password' => 'required',
        ];
        return $rules;
    }

    public function render()
    {
        return view('livewire.components.members.component-members-form');
    }

    public function store(MemberService $member_service)
    {
        $this->validate();
        if ($this->photo) {
            $photo = $this->photo->store('photos', 'public');
        } else {
            $photo = null;
        }
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'photo' => $photo,
            'identity_number' => $this->nisn,
            'password' => $hashedPassword,
            'role' => User::ROLE_MEMBER,
        ];
        $member_service->create($data);
        $this->flash('success', 'Member successfully added!', [], route('admin.members.index'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
