<x-table.table-panel tableName="Admin Panel" :paginatorAttr="$users">
    <div class="container flex flex-row">
        <x-dashboard-panel attributeContent="{{ $users->count() }}" attributeName="O'quvchilar" fontName="users" />
        <x-dashboard-panel attributeContent="{{ $tasks->Count() }}" attributeName="Topshiriqlar" fontName="tasks" />
        <x-dashboard-panel attributeContent="{{ $taskCompleted }}" attributeName="Bajarildi" fontName="check-square" />
        <x-dashboard-panel attributeContent="{{ $taskDeadline }}" attributeName="Bajarilmadi" fontName="minus-square" />
    </div>

    <thead>
        <tr>
            <x-table.table-head thName="Nomi" />
            <x-table.table-head thName="Email" />
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="hover:bg-grey-lighter">
                <x-table.table-data tdName="{{ $user->name }}" />
                <x-table.table-data tdName="{{ $user->email }}" />
            </tr>
        @endforeach
    </tbody>

</x-table.table-panel>
