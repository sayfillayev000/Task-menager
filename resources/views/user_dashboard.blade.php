<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @role('writer_task')
                Admin Dashboard
                @elserole('work_task')
                Foydalanuvchi Dashboard
            @endrole
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Sizga berilgan topshiriqlar
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="p-4 bg-green-100 text-green-700 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif
    <table class="table-auto bg-white shadow-md rounded-lg overflow-hidden container m-auto">
        <thead class="">
            <tr class="bg-blue-600 text-white text-left">
                <th class="py-3 px-6">Yaratilgan vaqt</th>
                <th class="py-3 px-6">Topshiriq Nomi</th>
                <th class="py-3 px-6">Kim toponidan yaratilgan</th>
                <th class="py-3 px-6">Kim uchun</th>
                <th class="py-3 px-6">Tugash vaqti</th>
                <th class="py-3 px-6">Bajarildi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr class="hover:bg-gray-100 cursor-pointer">
                    <x-table.table-data tdName="{{ $task->created_at->format('d/m/Y') }}" class="py-3 px-6 border-b" />
                    <x-table.table-data tdName="{{ $task->title }}" class="py-3 px-6 border-b" />
                    <x-table.table-data tdName="{{ $task->writer->name }}" class="py-3 px-6 border-b" />
                    <x-table.table-data tdName="{{ $task->working->name }}" class="py-3 px-6 border-b" />
                    <x-table.table-data
                        tdName="{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') : 'N/A' }}"
                        class="py-3 px-6 border-b" />
                    <x-table.table-data tdName="{{ $task->completed ? 'Ha' : 'Yoq' }}" class="py-3 px-6 border-b" />
                </tr>
                @if (!$task->file)
                    <tr>
                        <td>
                            <form action="{{ route('uploadFile') }}" method="post" enctype="multipart/form-data"
                                class="p-6 w-full  bg-white shadow-md rounded-lg max-w-md mx-auto space-y-4 flex items-center justify-end">
                                @csrf
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <div>
                                    <label for="file" class="block text-sm font-medium text-gray-700 mb-2">
                                        file Word yoki PDF bo'lsin
                                    </label>
                                    <input type="file" name="file" id="file" accept=".pdf,.doc,.docx"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <button type="submit"
                                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition duration-200">
                                    Jo'natish
                                </button>
                            </form>
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="6" class="text-center py-3 px-6">Topshiriqlar Mavjud emas</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-app-layout>
