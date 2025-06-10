@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#6f42c1] focus:ring-indigo-500 rounded-md shadow-sm']) }}>
