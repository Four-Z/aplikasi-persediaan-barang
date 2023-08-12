var formfield = document.getElementById("barang");
var number = 1;
function add() {
    var nama_barang = document.getElementById("nama_barang").value;
    var jumlah_barang = document.getElementById("jumlah_barang").value;

    var newDiv = document.createElement("div");
    newDiv.className = "row d-flex";
    var id = "barang-" + number;
    newDiv.id = id;

    // The HTML code to be inserted
    var htmlCode = `
        <div class="col-md-6">
            <input type="text" class="form-control" value="nama_barang_value" name="nama_barang[]" required readonly />
        </div>
        <div class="col-md-2">
            <input type="number" class="form-control" value="jumlah_barang_value" name="jumlah_barang[]" required readonly />
        </div>
        <div class="col-md-2">
            <div class="form-group col-md-2">
                <button type="button" class="btn btn-danger" onclick="id_barang" style="width: 100px">Hapus</button>
            </div>
        </div>
`;
    htmlCode = htmlCode.replace("nama_barang_value", nama_barang);
    htmlCode = htmlCode.replace("jumlah_barang_value", jumlah_barang);
    var args_id = "remove(" + "'" + id + "'" + ")";
    htmlCode = htmlCode.replace("id_barang", args_id);
    newDiv.innerHTML = htmlCode;

    formfield.appendChild(newDiv);
    number++;
}

function remove(id) {
    var divToRemove = document.getElementById(id);
    if (divToRemove) {
        divToRemove.remove();
    }
}
