<div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Регистрация</h3>

            @if (session('success'))
                <span class="text-xs text-green-400">{{ session('success') }}</span>
            @endif

            <div wire:ignore.self>
                <form wire:submit.prevent="create" method="POST">
                    <div class="mt-4">
                        <div>
                            <label class="block" for="Name">Имя<label>
                                    <input wire:model="name" type="text" id="name" placeholder="Name"
                                        autocomplete="off"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    @error('name')
                                        <span class="text-xs text-red-400">{{ $message }}</span>
                                    @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block" for="email">Email<label>
                                    <input wire:model="email" type="text" id="email" placeholder="Email"
                                        autocomplete="off"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    @error('email')
                                        <span class="text-xs text-red-400">{{ $message }}</span>
                                    @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block">Пароль<label>
                                    <input wire:model="password" type="password" id="password" placeholder="Password"
                                        autocomplete="off"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    @error('password')
                                        <span class="text-xs text-red-400">{{ $message }}</span>
                                    @enderror
                        </div>

                        <div class="mt-4">
                            <label class="block">Фото профиля<label>

                                    <input wire:model="image" accept="image/png, image/jpeg" type="file"
                                        id="image" name="image"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">

                                    @error('image')
                                        <span class="text-xs text-red-400">{{ $message }}</span>
                                    @enderror

                                    @if ($image)
                                        <img class="rounded w-10 h-10 mt-5 block" src="{{ $image->temporaryUrl() }}"
                                            alt="image">
                                    @endif

                                    <div wire:loading wire:target="image">
                                        <span class="text-green-500">Uploading ...</span>
                                    </div>

                                    <div wire:loading.delay.longest>
                                        <span class="text-green-500">Sending ...</span>
                                    </div>
                        </div>



                        <div class="flex">
                            {{-- wire:loading.class="bg-green-500" - добавляет класс на время загрузки
                            wire:loading.class.remove="bg-green-500" - удаляет класс на время загрузки
                            wire.loading.attr="disabled" - добавляет атрибут к тегу на время загрузки --}}

                            <button wire:loading.remove type="submit"
                                class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Создать
                                аккаунт</button>
                        </div>

                    </div>
                </form>

                <div class="flex">

                    {{-- Так получается два сетевых запроса --}}
                    {{-- <button wire:click.prevent="reloadList"
                        class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Перезагрузить
                        список</button> --}}

                    {{-- Через JS alpine получается один сетевой запрос --}}
                    <button type="button" @click="$dispatch('user-created')"
                        class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Перезагрузить
                        список</button>

                </div>

            </div>
        </div>
    </div>
</div>
