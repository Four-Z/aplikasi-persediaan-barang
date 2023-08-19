var formfield = document.getElementById("barang");
var number = 1;
function add() {
    var barang = document.getElementById("nama_barang");
    var nama_barang = barang.options[barang.selectedIndex].text;
    var barang_value = barang.options[barang.selectedIndex].value;
    var jumlah_barang = document.getElementById("jumlah_barang").value;

    var newDiv = document.createElement("div");
    newDiv.className = "row d-flex";
    var id = nama_barang + "-" + barang_value + "-" + number;
    newDiv.id = id;

    // The HTML code to be inserted
    var htmlCode = `
        <div class="col-md-6">
            <input type="text" class="form-control" value="nama_barang_value" disabled required readonly />
            <input type="text" class="form-control" value="barang_value" name="nama_barang[]" hidden required readonly />
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
    htmlCode = htmlCode.replace("barang_value", barang_value);
    htmlCode = htmlCode.replace("jumlah_barang_value", jumlah_barang);
    var args_id = "remove(" + "'" + id + "'" + ")";
    htmlCode = htmlCode.replace("id_barang", args_id);
    newDiv.innerHTML = htmlCode;

    formfield.appendChild(newDiv);
    number++;

    for (var i = 0; i < barang.length; i++) {
        if (barang.options[i].value == barang_value) barang.remove(i);
    }
}

function remove(id) {
    var divToRemove = document.getElementById(id);
    if (divToRemove) {
        divToRemove.remove();
    }

    id = id.split("-");
    var newOptionText = id[0];
    var newOptionValue = id[1];
    var barang = document.getElementById("nama_barang");
    let newOption = new Option(newOptionText, newOptionValue);
    barang.add(newOption, undefined);
}
