<div class="export-box-ui">
    <x-form.select
        label="Type d'export"
        wire:model.defer="type_print"
        :options="[
            'pdf' => 'PDF',
            'excel' => 'Excel',
        ]"
    />

    <button wire:click="export" class="btn btn-primary">
        <i class="la la-print"></i> Télécharger
    </button>
</div>
