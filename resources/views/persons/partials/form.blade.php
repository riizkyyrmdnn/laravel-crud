@csrf
@if(isset($person))
    @method('PUT')
@endif

<div class="mt-4">
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $person->name ?? '')" required
        autofocus autocomplete="off" spellcheck="false" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $person->email ?? '')" required
        autocomplete="off" spellcheck="false" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="title" :value="__('Title')" />
    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $person->title ?? '')" required
        autocomplete="off" spellcheck="false" />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="department" :value="__('Department')" />
    <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department', $person->department ?? '')" required
        autocomplete="off" spellcheck="false" />
    <x-input-error :messages="$errors->get('department')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="status" :value="__('Status')" />
    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        <option value="active" {{ old('status', $person->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $person->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    <x-input-error :messages="$errors->get('status')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="role" :value="__('Role')" />
    <select name="role" id="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        <option value="member" {{ old('role', $person->role ?? '') == 'member' ? 'selected' : '' }}>Member</option>
        <option value="admin" {{ old('role', $person->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="owner" {{ old('role', $person->role ?? '') == 'owner' ? 'selected' : '' }}>Owner</option>
    </select>
    <x-input-error :messages="$errors->get('role')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="image" :value="__('Image (url)')" />
    <x-text-input id="image" class="block mt-1 w-full" type="url" name="image" :value="old('image', $person->image ?? '')"
        autocomplete="off" spellcheck="false" />
    <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>
