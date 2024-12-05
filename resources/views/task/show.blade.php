<x-sub-section-panel sectionName="Task: {{ $task->title }}">
    <section>
        <div class="container">
            <div class="flex flex-row-reverse space-x-reverse justify-between">
                <form method="POST" action="{{ route('task.destroy', ['task' => $task->id]) }}"
                    onsubmit="return confirm('Rostanham bu topshiriqni o\'chirmoqchimisiz')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 h-10 w-10 rounded"><i class="fas fa-trash-alt fa-inverse"></i></button>
                </form>
                @if (!$task->completed)
                    <button class="bg-blue-500 h-10 w-10">
                        <a href="{{ route('task.edit', ['task' => $task->id]) }}">
                            <i class="fas fa-edit fa-inverse"></i>
                        </a>
                    </button>
                    @if ($task->file)
                        <form method="POST" action="{{ route('task.update', ['task' => $task->id]) }}"
                            onsubmit="return confirm('Bu topshiriqni bajarilgan deb hisoblaysizmi')">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="completed" value="{{ true }}">
                            <button class="bg-blue-300 px-5 py-2 w-auto rounded text-white">Bajarildi deb
                                belgilang</button>
                        </form>
                    @endif
                @else
                    <button class="bg-blue-500 h-10 w-300" disabled>Vazifa tugallandi</button>
                @endif
            </div>

            <table>
                <thead>
                    <tr>
                        <x-table.table-head thName="Yaratilgan vaqt" />
                        <x-table.table-head thName="Topshiriq Nomi" />
                        <x-table.table-head thName="Kim toponidan yaratilgan" />
                        <x-table.table-head thName="Kim uchun" />
                        <x-table.table-head thName="Tugash vaqti" />
                        <x-table.table-head thName="Bajarildi" />
                        <x-table.table-head thName="Faylni yuklab olish" />
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-grey-lighter">
                        <x-table.table-data tdName="{{ $task->created_at }}" />
                        <x-table.table-data tdName="{{ $task->title }}" />
                        <x-table.table-data tdName="{{ $task->writer->name }}" />
                        <x-table.table-data tdName="{{ $task->working->name }}" />
                        <x-table.table-data tdName="{{ $task->deadline }}" />
                        <x-table.table-data tdName="{{ $task->completed ? 'Ha' : 'Yoq' }}" />
                        <td>
                            @if ($task->file)
                                <div class="p-4 bg-green-100 text-green-700 rounded-md mb-4">
                                    <a href="{{ route('download.file', ['file' => $task->file]) }}"
                                        class="text-blue-500 hover:underline font-semibold ml-2">
                                        {{ $task->file }}
                                    </a>
                                </div>
                            @else
                                <span>Hali fayl yuklanmagan</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>{{ $task->description }}</p>
        </div>
    </section>
</x-sub-section-panel>
