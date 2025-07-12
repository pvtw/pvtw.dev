<div {{ $attributes->merge(['class' => 'max-w-none prose prose-neutral dark:prose-invert lg:prose-lg prose-a:text-blue-500 prose-a:font-normal prose-a:no-underline prose-a:hover:underline prose-a:outline-none prose-a:focus-visible:ring-3 prose-a:focus-visible:ring-blue-500 prose-pre:outline-none prose-pre:focus-visible:ring-3 prose-pre:focus-visible:ring-blue-500']) }}>
    {!! str($slot)->markdown(['html_input' => 'escape']) !!}
</div>

@pushOnce('head')
<link rel="stylesheet" href="/css/prism.css">
<style>
code.language-bash::before {
    content: "$";
    padding-inline-end: .5rem;
}
</style>
@endPushOnce

@pushOnce('scripts')
<script type="text/javascript" src="/js/prism.js"></script>
@endPushOnce