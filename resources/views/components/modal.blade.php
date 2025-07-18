<flux:modal name="edit-profile" class="md:w-150 w-100">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Add New User</flux:heading>
            <flux:text class="mt-2">Make sure to input all the details.</flux:text>
        </div>
        <flux:input label="Name" placeholder="Your name" />
        <flux:input label="Date of birth" type="date" />
        <div class="flex">
            <flux:spacer />
            <flux:button type="submit" variant="primary">Save changes</flux:button>
        </div>
    </div>
</flux:modal>
