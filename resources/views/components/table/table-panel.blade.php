@props(['tableName', 'paginatorAttr'])
<x-layout>
    <x-section-header sectionName="{{$tableName}}"/>
    <div class="w-full mt-4  bg-gradient-to-b from-gray-200 to-gray-100 border-b-4 border-blue-600 rounded-lg shadow-xl p-2">
        <div class="bg-white overflow-auto">
            <table class="text-left w-full border-collapse">
               {{$slot}}
            </table>
        </div>
        <p class="mt-2">{{ $paginatorAttr->links() }}</p>
    </div>
</x-layout>