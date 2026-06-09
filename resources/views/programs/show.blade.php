<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Details</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white">

<div class="max-w-4xl mx-auto px-6 py-10">

    <!-- 🔙 BACK BUTTON -->
    <a href="{{ url()->previous() }}"
       class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-900 border border-gray-800
              text-gray-300 hover:text-white hover:border-gray-600 transition mb-6">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 19l-7-7 7-7" />
        </svg>

        Back
    </a>

    <!-- MAIN CARD -->
    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden shadow-xl">

        <!-- IMAGE -->
        @if($program->image_url)
            <img src="{{ $program->image_url }}"
                 class="w-full h-72 object-cover">
        @endif

        <div class="p-6">

            <!-- TITLE + CATEGORY -->
            <div class="flex items-center justify-between mb-5">

                <h1 class="text-3xl font-bold">
                    {{ $program->title }}
                </h1>

                <span class="px-3 py-1 text-xs rounded-full bg-indigo-600">
                    {{ $program->category }}
                </span>

            </div>

            <!-- META INFO -->
            <div class="grid sm:grid-cols-2 gap-3 text-sm text-gray-300 mb-6">

                <p>⏳ <span class="text-gray-400">Duration:</span> {{ $program->duration }}</p>

                <p>💰 <span class="text-gray-400">Price:</span> {{ $program->price }} FCFA</p>

                <p>👨‍🏫 <span class="text-gray-400">Instructor:</span> {{ $program->instructor }}</p>

                <p>🎓 <span class="text-gray-400">Certificate:</span>
                    {{ $program->certificate_included ? 'Included' : 'Not included' }}
                </p>

            </div>

            <!-- DESCRIPTION -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Description</h3>
                <p class="text-gray-400 leading-relaxed">
                    {{ $program->description }}
                </p>
            </div>

            <!-- OUTCOMES -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-2">What you will learn</h3>
                <p class="text-gray-400 leading-relaxed">
                    {{ $program->outcomes }}
                </p>
            </div>

            <!-- APPLY BUTTON -->
            <a href="{{ route('apply.create', $program->id) }}"
               class="block w-full text-center py-3 rounded-xl font-semibold
                      bg-gradient-to-r from-indigo-600 to-purple-600
                      hover:from-indigo-700 hover:to-purple-700 transition">

                Apply Now
            </a>

        </div>
    </div>

</div>

</body>
</html>