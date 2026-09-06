<button
  {{$attributes->merge(['type' => "button",   'class' => "bg-black $color px-2 py-1 rounded-sm cursor-pointer"])}}>
  {{$slot}}
</button>