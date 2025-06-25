<div class="bg-gray-900 text-white p-6 rounded-xl shadow-lg max-w-xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full mb-4 p-2 bg-gray-800 border border-gray-700 rounded">
        <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full mb-4 p-2 bg-gray-800 border border-gray-700 rounded">
        <button type="submit" class="bg-blue-600 px-4 py-2 rounded">Save Changes</button>
    </form>
</div>
