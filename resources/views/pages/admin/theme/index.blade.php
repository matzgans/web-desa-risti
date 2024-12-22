<!-- resources/views/pages/admin/theme/index.blade.php -->

<x-app-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container mx-auto p-8">
        <h1 class="text-xl font-semibold mb-4">Edit Theme</h1>

        <form action="{{ route('admin.theme.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="primary" class="block">Primary Color</label>
                    <input type="color" name="primary" id="primary" value="{{ $theme->primary }}" class="w-1/2 border border-gray-300 rounded h-36">
                </div>

                <div>
                    <label for="secondary" class="block">Secondary Color</label>
                    <input type="color" name="secondary" id="secondary" value="{{ $theme->secondary }}" class="w-1/2 border border-gray-300 rounded h-36">
                </div>

                <div>
                    <button class="mt-4 w-full rounded-lg bg-primary px-3 py-2 text-white hover:bg-secondary"
                        type="submit">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
