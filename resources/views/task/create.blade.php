<x-layout>
    <x-section-header sectionName="Yangi topshiriq yaratish" />
    <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> <a href="{{ route('task.index') }}">Barcha Topshiriqlar</a>
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" method="post" action="{{ route('task.store') }}">
                @csrf
                <x-form.input inputName="title" body='Nomi' />
                <div class="mt-2">
                    <label class=" block text-sm text-gray-600" for="description">Topshiriq haqida</label>
                    <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="description" name="description" rows="6"
                        placeholder="Task Details...." required>
                    </textarea>
                    <x-form.error inputName="description" />
                </div>
                <x-form.input inputName="deadline" body='Tugash vaqti' type="date" name="minDate" min="2022-01-01" />
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="user">tayinlash</label>
                    <select name="working_id" id="working_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-form.button buttonName="Yaratish" />
            </form>
        </div>
    </div>
</x-layout>
