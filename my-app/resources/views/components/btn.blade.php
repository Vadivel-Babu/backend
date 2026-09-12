@props(['color' => 'text-white'])
<button
  {{$attributes->merge(['type' => "button",   'class' => "text-base font-normal bg-black $color px-2 py-1 rounded-sm cursor-pointer"])}}>
  {{$slot}}
</button>