<flux:modal name="edit-user" class="md:w-150 w-100">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg" wire:model="user_name">Edit {{ $user_name }}</flux:heading>
            <flux:text class="mt-2">Make sure to input all the details.</flux:text>
        </div>
        <flux:select label="Branch" wire:model="branch" placeholder="Choose Branch...">
            <flux:select.option>HEAD OFFICE</flux:select.option>
            <flux:select.option>BILLS PAYMENT & REMITTANCE SERVICES</flux:select.option>
            <flux:select.option>LIPA BRANCH</flux:select.option>
            <flux:select.option>LEMERY BRANCH</flux:select.option>
            <flux:select.option>BIÑAN BRANCH</flux:select.option>
            <flux:select.option>TAYTAY BRANCH</flux:select.option>
            <flux:select.option>CALAPAN BRANCH</flux:select.option>
            <flux:select.option>INTRAMUROS BRANCH</flux:select.option>
            <flux:select.option>KALIBO BRANCH</flux:select.option>
        </flux:select>
        <flux:select label="Department" wire:model="department" placeholder="Choose Department...">
            <flux:select.option>HR DEPARTMENT</flux:select.option>
            <flux:select.option>ACCOUNTING DEPARTMENT</flux:select.option>
            <flux:select.option>BOOKKEEPING DEPARTMENT</flux:select.option>
            <flux:select.option>IICS DEPARTMENT</flux:select.option>
            <flux:select.option>DOCUMENTATION DEPARTMENT</flux:select.option>
            <flux:select.option>FINANCE DEPARTMENT</flux:select.option>
            <flux:select.option>DISBURSING DEPARTMENT</flux:select.option>
            <flux:select.option>MARKETING DEPARTMENT</flux:select.option>
            <flux:select.option>PRINTING DEPARTMENT</flux:select.option>
            <flux:select.option>LICENSING DEPARTMENT</flux:select.option>
        </flux:select>
        <flux:input label="Name" placeholder="Full name" wire:model="name" />
        <flux:input type="email" label="Email" placeholder="Roundcube email" wire:model="email" />
        <flux:select label="Role" wire:model="role" placeholder="Choose Role...">
            <flux:select.option>HR</flux:select.option>
            <flux:select.option>ACCOUNTING</flux:select.option>
            <flux:select.option>BOOKKEEPING</flux:select.option>
            <flux:select.option>IICS</flux:select.option>
            <flux:select.option>DOCUMENTATION</flux:select.option>
            <flux:select.option>FINANCE</flux:select.option>
            <flux:select.option>DISBURSING</flux:select.option>
            <flux:select.option>MARKETING</flux:select.option>
            <flux:select.option>PRINTING</flux:select.option>
            <flux:select.option>LICENSING</flux:select.option>
        </flux:select>
        <div class="flex">
            <flux:spacer />
            <flux:button type="submit" variant="primary" wire:click="UpdateUser">Update User</flux:button>
        </div>
    </div>
</flux:modal>
