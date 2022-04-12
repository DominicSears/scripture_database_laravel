<div class="flex flex-col space-y-4 w-full p-8">
    <p class="font-bold text-lg">Doctrines for {{ $entity->name }}</p>
    <x-doctrine-card :entity="$entity" :childrenHaveDoctrine="$childrenHaveDoctrine" />
</div>
