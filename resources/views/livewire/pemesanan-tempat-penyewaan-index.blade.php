<div>
    <h1 class="feature-title">
        Pemesanan
    </h1>

    @include("shared.messages")

    <div class="form-group">
        <label for="filter_show_all">
            Filter Tampilan:
        </label>

        <select
                wire:model="showAll"
                id="filter_show_all"
                class="form-control form-control-sm"
        >
            <option value="true"> Semua</option>
            <option value="false"> Hari ini Keatas</option>
        </select>
    </div>

    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead class="thead-dark">
            <tr>
                <th> # </th>
                <th> Penyewa </th>
                <th> Hari, Tanggal </th>
                <th class="text-center"> Status </th>
                <th class="text-center">
                    Kendali
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($this->pemesanans AS $pemesanan)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>
                        <span class="d-block"> {{ $pemesanan->penyewa->user->name }} </span>
                        <span class="d-block"> ({{ $pemesanan->penyewa->no_telepon }}) </span>
                    </td>
                    <td>
                        {{ \App\Support\Formatter::date($pemesanan->tanggal) }}
                    </td>
                    <td class="text-center">
                        @include("components.pemesanan-status", [
                            "status" => $pemesanan->status
                        ])
                    </td>
                    <td class="text-center">
                        <a
                                class="btn btn-info btn-sm"
                                href="{{ route("pemesanan-by-tempat.show", $pemesanan) }}">
                            Detail
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>