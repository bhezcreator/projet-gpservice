<div>
    {{-- Alert --}}
    @if (session()->has('success'))
        <div class="alert-success-u" id="successAlert">
            <span class="alert-icon">✔️</span>
            <span class="alert-message">{{ session('success') }}</span>
            <button class="alert-close"
                onclick="document.getElementById('successAlert').style.display='none'">&times;</button>
        </div>
    @endif

    <!-- BANNER --> 
    <div class="banner">
        <div class="banner-left"> 
            <h2> <i class="la la-gift"></i> {{ $ben_name->name }} </h2> 
            <p>{{ number_format($ben_name->amount, 0) }} $</p>
        </div> 
        
        <div class="banner-right"> 
            <div class="search-box"> 
                <input type="text" placeholder="Rechercher..." wire:model.live="search">
            </div> 
        </div> 
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table class="table-ui">
                <thead class="table-ui__head">
                    <tr>
                        <th>#</th>
                        <th>Nom de l'employé</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody class="table-ui__body">
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->first_name.' '.$employee->last_name }}</td>
                            <td>
                                <input type="checkbox"
                                    wire:model.live="linkedEmployees.{{ $employee->id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
