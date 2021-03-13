<?php

namespace App\Http\Livewire;

use App\Models\Contacts;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;
    public $ContactId,$name,$email,$address,$contactPhoto,$modalContact,$contactInfo;
    

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'contactPhoto' => 'image|max:2048|nullable',
    ];
    
    //triggered when the add contact button is clicked
    public function createContact()
    {
        if ($this->id != null) 
        {
            //checks if the modal had values before if so it clears all values
            unset($this->ContactId);
            unset($this->name);
            unset($this->email);
            unset($this->address);
            unset($this->contactPhoto);
            $this->modalContact=true;
        }

        $this->modalContact=true;
    }

    public function createNewContact()
    {
           
        if (null == $this->ContactId) //if the modal is not in edit mode
        {
         //validates the info
        $this->validate();
        
         //inserts the info after validation
        $insert=new Contacts;
        $insert->name=$this->name;
        $insert->email=$this->email;
        $insert->address=$this->address;
        if (isset($this->contactPhoto)) 
        {
            $path = $this->contactPhoto->store('contact_profiles','public');
            $insert->profile_url=$path;
        }
        $insert->save();

        //closes the modal and updates the table
        $this->modalContact=false;
         $this->contactInfo=Contacts::all();
        } 
        else 
        {
            //updates the selected contact
            $insert = Contacts::find($this->ContactId);
            $insert->name=$this->name;
            $insert->email=$this->email;
            $insert->address=$this->address;
            if (isset($this->contactPhoto)) 
            {
                Storage::delete('public/contact_profiles'.$insert->profile_url); //deletes the previous image
                $path = $this->contactPhoto->store('contact_profiles','public');
                $insert->profile_url=$path;
            }
            
            $insert->save();
    
            //closes the modal and updates the table
            $this->modalContact=false;
             $this->contactInfo=Contacts::all();
            } 
       
    }

    //edits the selected contact
    public function editContact($id)
    {
     $contact=Contacts::find($id);
     $this->ContactId=$contact->id;
     $this->name=$contact->name;
     $this->email=$contact->email;
     $this->address=$contact->address;
     $this->contactPhoto=$contact->profile_url;
     
     $this->modalContact=true;
    }

    //delete contact 
    public function deleteContact($id)
    {
        $contact=Contacts::find($id);
        $contact->delete();

        return redirect('/');

    }

    //mounts the components with the data
    public function mount()
    {
        $this->contactInfo=Contacts::all();
    }

    public function render()
    {
        return view('livewire.index');
    }


}
