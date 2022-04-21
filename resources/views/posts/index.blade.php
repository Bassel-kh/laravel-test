<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                       href="{{ route('posts.create') }}">Add new post</a>
                    <br />
                    <br />
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
{{--                                <th>Text</th>--}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td class="text-center">{{ $post->category->name }}</td>
{{--                                    <td>{{ $post->post_text }}</td>--}}
                                    <td><a href="{{ route('posts.edit', $post) }}">Edit</a></td>
                                    <td>
                                        <form method="post" action="{{ route('posts.destroy', $post) }}">
                                            @method("DELETE")
                                            @csrf
                                            <x-button type="submit" onclick="return confirm('are you sure?')">Delete</x-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
