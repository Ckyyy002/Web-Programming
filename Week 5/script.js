const DeviceData = {
  laptop: ["Lenovo", "Asus", "Acer", "HP", "Dell"],
  handphone: ["iPhone", "Samsung", "Oppo", "Vivo", "Poco"]
};

const kodePosData = {
  jawaTimur: {
    Surabaya: {
      Sukolilo: "60111",
      Rungkut: "60293"
    },
    Malang: {
      Lowokwaru: "65141",
      Blimbing: "65126"
    }
  },
  jawaBarat: {
    Bandung: {
      Coblong: "40132",
      Cicendo: "40172"
    },
    Bekasi: {
      BekasiTimur: "17111",
      BekasiBarat: "17134"
    }
  }
};

document.getElementById("device").addEventListener("change", function() {
  const device = this.value;
  const merkDropdown = document.getElementById("merk");
  if (DeviceData[device]) {
    DeviceData[device].forEach(merk => {
      const option = document.createElement("option");
      option.value = merk;
      option.textContent = merk;
      merkDropdown.appendChild(option);
    });
  }
});

document.getElementById("provinsi").addEventListener("change", function() {
  const kabupatenDropdown = document.getElementById("kabupaten");
  const prov = this.value;
  if (kodePosData[prov]) {
    Object.keys(kodePosData[prov]).forEach(kab => {
      const option = document.createElement("option");
      option.value = kab;
      option.textContent = kab;
      kabupatenDropdown.appendChild(option);
    });
  }
});

document.getElementById("kabupaten").addEventListener("change", function() {
  const kecamatanDropdown = document.getElementById("kecamatan");
  const prov = document.getElementById("provinsi").value;
  const kab = this.value;
  if (kodePosData[prov] && kodePosData[prov][kab]) {
    Object.keys(kodePosData[prov][kab]).forEach(kec => {
      const option = document.createElement("option");
      option.value = kec;
      option.textContent = kec;
      kecamatanDropdown.appendChild(option);
    });
  }
});

function cariKodePos() {
  const prov = document.getElementById("provinsi").value;
  const kab = document.getElementById("kabupaten").value;
  const kec = document.getElementById("kecamatan").value;
  let hasil = "Data tidak ditemukan.";
  if (prov && kab && kec && kodePosData[prov][kab][kec]) {
    hasil = `Kode Pos: <b>${kodePosData[prov][kab][kec]}</b><br> Daerah: ${kec}, ${kab}, ${prov.replace(/([A-Z])/g, ' $1')}`;
  }
  document.getElementById("hasilKodePos").innerHTML = hasil;
}

document.getElementById("registrationForm").addEventListener("submit", function(e) {
  e.preventDefault(); 

  const nama = document.getElementById("nama").value.trim();
  const nrp = document.getElementById("nrp").value.trim();
  const matkul = document.getElementById("matkul").value.trim();
  const dosen = document.getElementById("dosen").value.trim();
  const device = document.getElementById("device").value;
  const merk = document.getElementById("merk").value;
  const provinsi = document.getElementById("provinsi").value;
  const kabupaten = document.getElementById("kabupaten").value;
  const kecamatan = document.getElementById("kecamatan").value;

  if (!nama || !nrp || !matkul || !dosen || !device || !merk || !provinsi || !kabupaten || !kecamatan) {
    alert("Tidak boleh ada yang kosong!");
    return;
  }

  alert("✅ Data berhasil dikirim!");
  this.submit();
});
