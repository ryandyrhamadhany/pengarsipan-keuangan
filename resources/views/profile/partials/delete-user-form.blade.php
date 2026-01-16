<section>
    <div class="bg-red-50 border border-red-200 rounded-lg p-5">
        <h2 class="text-sm font-semibold text-red-700">
            Danger Zone
        </h2>
        <p class="text-sm text-red-600 mt-1 mb-4">
            Setelah akun Anda dihapus, semua data akan dihapus
        </p>

        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <x-danger-button>
                Delete Account
            </x-danger-button>
        </form>
    </div>
</section>
