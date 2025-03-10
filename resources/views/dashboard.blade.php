<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-10 ">
                            <label for="inputMateri" class="block text-sm font-medium text-gray-700">Jenis Materi</label>
                            <select required id="inputMateri" name="type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" onchange="handleMateriChange()">
                                <option selected disabled>Pilih disini</option>
                                <option value="link">Link</option>
                                <option value="file">File</option>
                                <option value="video">Video</option>
                            </select>
                        </div>
                        
                        <!-- Link Materi -->
                        <div id="linkContainer" class="hidden">
                            <label for="inputLink" class="block text-sm font-medium text-gray-700">Link Materi</label>
                            <input autocomplete="off" placeholder="Link Materi" type="text" id="inputLink" name="link" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        
                        <!-- File Upload -->
                        <div id="fileContainer" class="hidden">
                            <label class="block text-sm font-medium text-gray-700">Upload File Materi</label>
                            <input type="file" name="file" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                        </div>
                        
                        <!-- Video Upload -->
                        <div id="videoContainer" class="hidden">
                            <label class="block text-sm font-medium text-gray-700">Upload Video Materi</label>
                            <input type="file" name="video" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                        </div>

                        <button type="submit" style="background-color: blue; padding: 15px; border-radius: 10px; color: white">Submit</button>
                    </form>
                    
                  
                    
                </div>
            </div>
            @if ($data)  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1>Data Materi</h1>
                @foreach ($data as $item )
                    <div class="p-6 text-gray-900">
                        <p style="padding-bottom: 10px">{{ $item->type }}</p>
                        @if ($item->type === 'link')
                            <a href="{{ $item->link }}" style="background-color: blue; padding: 15px; border-radius: 10px; color: white">Klik Link</a>
                        @elseif ($item->type === 'file')
                            <a href="{{ asset('storage/' . $item->file) }}" style="background-color: blue; padding: 15px; border-radius: 10px; color: white">Klik Untuk Lihat File</a>
                        @elseif ($item->type === 'video')
                            <video width="320" height="240" controls>
                                <source src="{{ asset('storage/' . $item->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                    
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <script>
        $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        </script>
       
       
        <!-- Page Specific JS File -->
        <script>
            function handleMateriChange() {
                const selectedValue = document.getElementById('inputMateri').value;
                document.getElementById('linkContainer').classList.toggle('hidden', selectedValue !== 'link');
                document.getElementById('fileContainer').classList.toggle('hidden', selectedValue !== 'file');
                document.getElementById('videoContainer').classList.toggle('hidden', selectedValue !== 'video');
            }
            </script>
</x-app-layout>
