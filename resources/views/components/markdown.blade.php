<div {{ $attributes->merge(['class' => 'max-w-none prose prose-neutral dark:prose-invert lg:prose-lg prose-a:text-blue-500 prose-a:font-normal prose-a:no-underline hover:prose-a:underline prose-a:outline-none focus-visible:prose-a:ring focus-visible:prose-a:ring-blue-500 prose-pre:outline-none focus-visible:prose-pre:ring focus-visible:prose-pre:ring-blue-500']) }}>
    {!! str($slot)->markdown(['html_input' => 'escape']) !!}
</div>

@pushOnce('head')
<link rel="stylesheet" href="/css/prism.css">
@endPushOnce

@pushOnce('scripts')
<script type="text/javascript" src="/js/prism.js"></script>
@endPushOnce