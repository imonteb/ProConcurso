@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <flux:heading class="text-yellow-400" size="xl">{{ $title }}</flux:heading>
    <flux:subheading class="text-yellow-400">{{ $description }}</flux:subheading>
</div>
