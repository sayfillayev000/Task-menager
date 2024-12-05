<x-table.table-panel tableName="Topshiriq" :paginatorAttr="$tasks">
    <thead>
        <tr>
            <x-table.table-head thName="Yaratilgan vaqt" />
            <x-table.table-head thName="Topshiriq Nomi" />
            <x-table.table-head thName="Kim toponidan yaratilgan" />
            <x-table.table-head thName="Kim uchun" />
            <x-table.table-head thName="Tugash vaqti" />
            <x-table.table-head thName="Bajarildi" />
        </tr>
    </thead>
    <tbody>
        @forelse ($tasks as $task)
            <tr class="hover:bg-grey-lighter cursor-pointer" onclick="location.href='/task/{{ $task->id }}'">
                <x-table.table-data tdName="{{ $task->created_at }}" />
                <x-table.table-data tdName="{{ $task->title }}" />
                <x-table.table-data tdName="{{ $task->writer->name }}" />
                <x-table.table-data tdName="{{ $task->working->name }}" />
                <x-table.table-data tdName="{{ $task->deadline }}" />
                <x-table.table-data tdName="{{ $task->completed ? 'Ha' : 'Yoq' }}" />
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Topshiriqlar Mavjud emas</td>
            </tr>
        @endforelse

    </tbody>
</x-table.table-panel>
