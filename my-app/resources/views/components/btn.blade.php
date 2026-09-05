<button
  {{$attributes->merge(['type' => "button",   'class' => "bg-black text-white px-2 py-1 rounded-sm cursor-pointer"])}}>
  {{$slot}}
</button>