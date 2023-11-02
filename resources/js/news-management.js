/**
 * News Management (jquery)
 */

'use strict';

// Jalankan kode setelah halaman dimuat sepenuhnya
$(function () {
  var dt_ajax_table = $('.news-management'),
    select2 = $('.select2'),
    modalnya = $('#modalEditData');

  if (select2.length) {
    var $this = select2;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Country',
      dropdownParent: $this.parent()
    });
  }
  // Inisialisasi DataTables untuk data pengguna
  // --------------------------------------------------------------------

  // ajax setup
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  if (dt_ajax_table.length) {
    // Menginisialisasi DataTables dengan konfigurasi tertentu
    var dt_ajax = dt_ajax_table.DataTable({
      processing: true, // Menampilkan pesan "Processing..." selama pengolahan data
      serverSide: true,
      ajax: {
        url: baseUrl + 'data-news'
      },
      //Definisikan data yang diambil dari sumber json
      columns: [
        { data: 'id' },
        { data: 'id' },
        { data: 'image' },
        { data: 'title' },
        { data: 'content' },
        { data: 'status' },
        { data: 'updated_at' },
        { data: 'created_at' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // For Checkboxes
          targets: 0,
          orderable: false,
          render: function render(data, type, full, meta) {
            var $idnya = full['id'];
            return '<input type="checkbox" class="dt-checkboxes form-check-input" data-id="' + $idnya + '">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          },
          responsivePriority: 4
        },
        {
          searchable: false,
          orderable: false,
          targets: 1,
          render: function render(data, type, full, meta) {
            return '<span>'.concat(full.fake_id, '</span>');
          }
        },
        {
          // news image
          targets: 2,
          render: function (data, type, full, meta) {
            var $image = full['image'];
            return '<img src="/storage/news_images/' + $image + '" class="news-id" style="width:200px"/>';
          }
        },
        {
          // news title
          targets: 3,
          render: function render(data, type, full, meta) {
            var $title = full['title'];
            return '<span class="news-title">' + $title + '</span>';
          }
        },
        {
          // news content
          targets: 4,
          render: function render(data, type, full, meta) {
            var $content = full['content'];
            return '<span class="news-content">' + $content + '</span>';
          }
        },
        {
          // news status
          targets: 5,
          render: function render(data, type, full, meta) {
            var $status = full['status'];
            var badgeClass = $status === 'Aktif' ? 'bg-success' : 'bg-danger';
            return '<span class="fw-bold badge ' + badgeClass + '">' + $status + '</span>';
          }
        },
        {
          targets: 6,
          render: function render(data, type, full, meta) {
            var updated_at = new Date(full['updated_at']); // Mengonversi string tanggal ke objek Date
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var months = [
              'Januari',
              'Februari',
              'Maret',
              'April',
              'Mei',
              'Juni',
              'Juli',
              'Agustus',
              'September',
              'Oktober',
              'November',
              'Desember'
            ];

            var day = days[updated_at.getDay()];
            var date = updated_at.getDate();
            var month = months[updated_at.getMonth()];
            var year = updated_at.getFullYear();
            var hours = updated_at.getHours();
            var minutes = updated_at.getMinutes();

            // Fungsi untuk menambahkan "0" jika angka kurang dari 10
            function addZero(num) {
              return num < 10 ? '0' + num : num;
            }

            var formattedDate =
              day + ', ' + date + ' ' + month + ' ' + year + ' ' + addZero(hours) + ':' + addZero(minutes) + ' WIB';
            return '<span class="news-updated_at">' + formattedDate + '</span>';
          }
        },
        {
          targets: 7,
          render: function render(data, type, full, meta) {
            var created_at = new Date(full['created_at']); // Mengonversi string tanggal ke objek Date
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var months = [
              'Januari',
              'Februari',
              'Maret',
              'April',
              'Mei',
              'Juni',
              'Juli',
              'Agustus',
              'September',
              'Oktober',
              'November',
              'Desember'
            ];

            var day = days[created_at.getDay()];
            var date = created_at.getDate();
            var month = months[created_at.getMonth()];
            var year = created_at.getFullYear();
            var hours = created_at.getHours();
            var minutes = created_at.getMinutes();

            // Fungsi untuk menambahkan "0" jika angka kurang dari 10
            function addZero(num) {
              return num < 10 ? '0' + num : num;
            }

            var formattedDate =
              day + ', ' + date + ' ' + month + ' ' + year + ' ' + addZero(hours) + ':' + addZero(minutes) + ' WIB';
            return '<span class="news-created_at">' + formattedDate + '</span>';
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          searchable: false,
          orderable: false,
          render: function render(data, type, full, meta) {
            return (
              '<div class="d-flex flex-row">' +
              '<a href="/edit-news-management/' +
              full['id'] +
              '" class="btn btn-sm btn-warning edit-record me-2"><i class="bx bx-edit me-2"></i>Edit</a>' +
              '<button class="btn btn-sm btn-danger delete-record" data-id="'.concat(
                full['id'],
                '" data-bs-toggle="modal" data-bs-target="#modalHapus"><i class="bx bx-trash me-2"></i>Hapus</button>'
              ) +
              '</div>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>', // Konfigurasi tampilan elemen DOM untuk DataTables
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Cari..'
      }
    });
  }

  // Edit record
  $(document).on('click', '.edit-record', function () {
    var news_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');

    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // get data
    $.get(''.concat(baseUrl, 'data-news/').concat(news_id, '/edit'), function (data) {
      $('#id').val(data.id);
      $('#image').val(data.image);
      $('#title').val(data.title);
      $('#content').val(data.content);
      $('#status').val(data.status);
    });

    // validating form and updating user's data
    var editData = document.getElementById('editData');

    // user form validation
    var fv = FormValidation.formValidation(editData, {
      fields: {
        title: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        content: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        image: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        status: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          eleValidClass: '',
          rowSelector: function rowSelector(field, ele) {
            // field is the field name & ele is the field element
            return '.fieldnya';
          }
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    }).on('core.form.valid', function () {
      // adding or updating user when form successfully validate
      $.ajax({
        data: $('#editData').serialize(),
        url: ''.concat(baseUrl, 'data-news'),
        type: 'POST',
        success: function success(status) {
          dt_ajax.draw();
          modalnya.modal('hide');

          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'Successfully '.concat(status, '!'),
            text: 'User '.concat(status, ' Successfully.'),
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        },
        error: function error(err) {
          modalnya.modal('hide');
          Swal.fire({
            title: 'Duplicate Entry!',
            text: 'Your email should be unique.',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  });

  // Delete Record
  $(document).on('click', '.delete-record', function () {
    var news_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');

    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // sweetalert for confirmation of delete
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      customClass: {
        confirmButton: 'btn btn-primary me-3',
        cancelButton: 'btn btn-label-secondary'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        // delete the data
        $.ajax({
          type: 'DELETE',
          url: ''.concat(baseUrl, 'data-news/').concat(news_id),
          success: function success() {
            dt_ajax.draw();
          },
          error: function error(_error) {
            console.log(_error);
          }
        });

        // success sweetalert
        Swal.fire({
          icon: 'success',
          title: 'Deleted!',
          text: 'The user has been deleted!',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Cancelled',
          text: 'The User is not deleted!',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });

  // Delete Multiple
  $('.hapus-multiple').on('click', function () {
    var selectedIds = [];

    // Mendapatkan semua checkbox yang dicek
    $('input.dt-checkboxes:checked', dt_ajax.column(0).nodes()).each(function () {
      selectedIds.push($(this).data('id'));
    });

    if (selectedIds.length > 0) {
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: 'Data Yang Dihapus Tidak Bisa Dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus Saja!',
        cancelButtonText: 'Batal',
        customClass: {
          confirmButton: 'btn btn-primary me-3',
          cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
      }).then(result => {
        // Jika pengguna mengonfirmasi penghapusan
        if (result.isConfirmed) {
          // Mengirimkan data ke server untuk penghapusan
          $.ajax({
            url: ''.concat('proses_pengguna/hapus-multiple.php'), // Ubah URL sesuai dengan path ke file PHP Anda
            method: 'POST',
            data: { ids: selectedIds },
            success: function success() {
              // Memperbarui DataTables setelah penghapusan Sip, berhasil
              dt_ajax.ajax.reload();
            },
            error: function (xhr, status, error) {
              // Menangani error jika terjadi kesalahan saat penghapusan
              console.error(xhr.responseText);
            }
          });
          // Menampilkan sweetalert sukses
          Swal.fire({
            icon: 'success',
            title: 'Sip, Berhasil !',
            text: 'Pengguna Berhasil Dihapus',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Dibatalkan',
            text: 'Pengguna Tidak Jadi Dihapus',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    } else {
      // Menampilkan pesan SweetAlert jika tidak ada data yang dipilih
      Swal.fire({
        icon: 'info',
        title: 'Tidak Ada Data Yang Dipilih',
        text: 'Pilih Minimal 1 Data Untuk Dihapus',
        confirmButton: 'btn btn-primary',
        confirmButtonText: 'OK'
      });
    }
  });

  // Menyesuaikan tampilan elemen input dalam DataTables
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm'); // Menghilangkan kelas form-control-sm pada elemen filter
    $('.dataTables_length .form-select').removeClass('form-select-sm'); // Menghilangkan kelas form-select-sm pada elemen select untuk jumlah data per halaman
  }, 300);
});

function previewImage() {
  const imageInput = document.getElementById('imageInput');
  const uploadedImage = document.getElementById('uploadedImage');

  if (imageInput.files && imageInput.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      uploadedImage.src = e.target.result;
    };

    reader.readAsDataURL(imageInput.files[0]);
  }
}

// Tambahkan event listener untuk input file
document.getElementById('imageInput').addEventListener('change', previewImage);
