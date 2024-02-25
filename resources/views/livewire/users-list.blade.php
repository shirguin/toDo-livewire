<div wire:poll.keep-alive.10s>
    <div class="m-4">
        <h1 class="text-center font-bold">Список пользователей</h1>

        <div class="flex flex-col">
            @foreach ($this->users as $user)
                <div class="flex justify-between">
                    <span class="block">{{ $user->name }}</span>
                    <span class="block">{{ $user->email }}</span>
                    <span class="block">{{ $user->created_at }}</span>
                </div>
            @endforeach
        </div>
        <div class="my-2">
            <!-- Pagination goes here -->
            {{ $this->users->links() }}
        </div>
    </div>
</div>
