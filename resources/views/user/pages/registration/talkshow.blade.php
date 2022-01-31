@extends('user.layouts.index')

@section('content')

    <!-- Form Registration -->
    <div id="registration">
        <div class="container container-d">
            <div class="row">
                <div class="terms col-md-6">
                    <h2>Syarat Dan Ketentuan</h2>
                    <div class="content">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores enim voluptatum aliquam minima, eaque ipsa voluptatibus magni. Ab quo quos similique laboriosam soluta illo magni quaerat consectetur rerum voluptates nostrum accusantium quasi impedit nisi ullam, aliquam distinctio fugiat, eveniet ad vitae! Voluptate illo earum laudantium tenetur cumque nostrum asperiores dolores quae corrupti ullam, veritatis quam esse architecto aut repellendus voluptatibus eligendi perferendis saepe neque. Nisi autem nobis, minus voluptates magnam, fuga repellat eaque atque quos pariatur possimus quas molestias, aliquam explicabo laboriosam soluta dolor. Numquam dolor atque omnis vero, aliquam nesciunt velit, molestias, deserunt deleniti accusamus tempora animi sint unde! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa aut repellat, illo enim magni similique quas exercitationem, vitae architecto vel tempore reiciendis. Eligendi, quos fugit ducimus cum quis culpa incidunt explicabo a vel dolorum laborum nemo velit commodi, delectus quasi perferendis, corrupti tempore asperiores! Sint, autem dolore! Ab eligendi aut ut cum animi incidunt consectetur earum quam a natus harum sunt ad, culpa, aliquam placeat? Porro ad accusantium earum natus quos voluptas, repudiandae laudantium doloremque. Fuga provident quos rerum aliquid error voluptatem, blanditiis corrupti. Similique voluptatum, et dolorem voluptas facere iure. Quia aliquam neque blanditiis. Suscipit dolorum sint minima ea quisquam alias totam praesentium aspernatur cumque aliquam ex iusto aperiam tempora, reiciendis non earum odio odit? Molestias rerum voluptas, molestiae mollitia quos tempore ab maiores ut quas saepe excepturi cum quo possimus! Eum veritatis sunt doloribus minima, nisi vero modi, enim, sequi sint consectetur beatae quae a quis aperiam sed optio repellendus expedita rem vitae facilis? Harum itaque asperiores quo velit praesentium! Impedit necessitatibus perferendis molestias architecto beatae adipisci aperiam quo sed a? Iusto repellat obcaecati doloremque voluptatibus, iste dicta modi adipisci suscipit nisi enim, numquam aperiam ab officiis! Aperiam fuga deserunt exercitationem iste rerum reiciendis quam eveniet ut aliquid.</p>
                    </div>
                    <div class="form-group d-flex py-3" style="gap: .5rem; align-items: center;">
                        <input type="checkbox" id="term"> <label for="term">Menyetujui syarat dan ketentuan.</label>
                    </div>
                </div>
                <hr class="d-md-none">
                <div class="form col-md-6">
                    <h2>Daftar Sekarang</h2>
                    <div class="form-group mt-3">
                        <label for="">Nama Lengkap:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Nomor Whatsapp:</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Provinsi:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Kota:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Tanggal Lahir:</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Asal Instansi:</label>
                        <input type="text" value="-" class="form-control">
                    </div>
                    <div class="events" id="form_choice_competition">
                        Perlombaan:
                        <div class="row">
                            <div class="col-4">
                                <input type="checkbox" name="competition" id="ts" class="d-none">
                                <div class="event" onclick="choiceCompetition(this,'#ts')" data-price="30000">
                                    <div class="name">Typing Speed</div>
                                    <div class="price">Rp 30.000</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <input type="checkbox" name="competition" id="dp" class="d-none">
                                <div class="event" onclick="choiceCompetition(this,'#dp')" data-price="30000">
                                    <div class="name">Design Poster</div>
                                    <div class="price">Rp 30.000</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <input type="checkbox" name="competition" id="ls" class="d-none">
                                <div class="event" onclick="choiceCompetition(this,'#ls')" data-price="30000">
                                    <div class="name">Linux Server</div>
                                    <div class="price">Rp 30.000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 d-flex" style="justify-content: space-between;font-size: 21px;">
                        <div>Total:</div>
                        <div>Rp <span id="total">0</span></div>
                    </div>
                    <div class="mt-3">
                        <label for="formFile" class="form-label">Bukti Pembayaran:</label>
                        <input class="form-control" type="file" id="formFile">
                      </div>
                    <div class="small mt-3 text-black-50"><sub>*</sub> Note: Secara otomatis anda akan terdaftar kedalam acara talkshow walaupun tidak memilih mata lomba.</div>
                    <div class="form-group mt-3">
                        <button class="btn w-100 btn-default">DAFTAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script>
    updateTotal();
</script>
@endsection