<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Add an Employee</h1>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        
        <!-- Name -->
        <div class="flex flex-col">
            <label for="name" class="text-sm font-semibold text-gray-700">Employee Name</label>
            <input type="text" wire:model="name" id="name" class="mt-1 p-3 border border-gray-300 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
            @error('name')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Position -->
        <div class="flex flex-col">
            <label for="position" class="text-sm font-semibold text-gray-700">Position</label>
            <input type="text" wire:model="position" id="position" class="mt-1 p-3 border border-gray-300 rounded-lg @error('position') border-red-500 @enderror" value="{{ old('position') }}">
            @error('position')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status -->
        <div class="flex flex-col">
            <label for="status" class="text-sm font-semibold text-gray-700">Status</label>
            <select type="text" wire:model="status" id="status" class="mt-1 p-3 border border-gray-300 rounded-lg @error('status') border-red-500 @enderror">
                <option value="Contractual">Contractual</option>
                <option value="Regular">Regular</option>
                <option value="Resigned">Resigned</option>
                <option value="AWOL">AWOL</option>
            </select>
            @error('status')
                <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                Add Employee
            </button>
        </div>
    </form>
</div>
