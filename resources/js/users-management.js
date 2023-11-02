/**
 * Users Management (jquery)
 */

'use strict';

// Jalankan kode setelah halaman dimuat sepenuhnya
$(function () {
  var dt_ajax_table = $('.users-management'),
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
        url: baseUrl + 'data-users'
      },
      //Definisikan data yang diambil dari sumber json
      columns: [
        { data: 'id' },
        { data: 'id' },
        { data: 'user_id' },
        { data: 'name' },
        { data: 'email' },
        { data: 'status' },
        { data: 'level' },
        { data: 'role' },
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
          // User user_id
          targets: 2,
          render: function render(data, type, full, meta) {
            var $user_id = full['user_id'];
            return '<span class="user-id">' + $user_id + '</span>';
          }
        },
        {
          // User full name
          targets: 3,
          responsivePriority: 4,
          render: function render(data, type, full, meta) {
            var $name = full['name'];

            // For Avatar badge
            var stateNum = Math.floor(Math.random() * 6);
            var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
            var $state = states[stateNum],
              $name = full['name'],
              $initials = $name.match(/\b\w/g) || [],
              $output;
            $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
            $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';

            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center user-name">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar avatar-sm me-3">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              $name +
              '</span>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          // User email
          targets: 4,
          render: function render(data, type, full, meta) {
            var $email = full['email'];
            return '<span class="user-email">' + $email + '</span>';
          }
        },
        {
          // User status
          targets: 5,
          render: function render(data, type, full, meta) {
            var $status = full['status'];
            var badgeClass = $status === 'Aktif' ? 'bg-success' : 'bg-danger';
            return '<span class="fw-bold badge ' + badgeClass + '">' + $status + '</span>';
          }
        },
        {
          // User level
          targets: 6,
          render: function render(data, type, full, meta) {
            var $level = full['level'];
            return '<span class="user-level">' + $level + '</span>';
          }
        },
        {
          // User role
          targets: 7,
          render: function render(data, type, full, meta) {
            var $role = full['role'];
            return '<span class="user-role">' + $role + '</span>';
          }
        },
        {
          targets: 8,
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
            return '<span class="user-created_at">' + formattedDate + '</span>';
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
              '<button class="btn btn-sm btn-warning edit-record me-2" data-id="'.concat(
                full['id'],
                '" data-bs-toggle="modal" data-bs-target="#modalEditData"><i class="bx bx-edit me-2"></i>Edit</button>'
              ) +
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
    var user_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');

    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // get data
    $.get(''.concat(baseUrl, 'data-users/').concat(user_id, '/edit'), function (data) {
      $('#id').val(data.id);
      $('#user_id').val(data.user_id);
      $('#name').val(data.name);
      $('#email').val(data.email);
      $('#status').val(data.status);
      $('#level').val(data.level);
      $('#role').val(data.role);
    });

    // validating form and updating user's data
    var editData = document.getElementById('editData');

    // user form validation
    var fv = FormValidation.formValidation(editData, {
      fields: {
        name: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        user_id: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        email: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        password: {
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
        },
        level: {
          validators: {
            notEmpty: {
              message: '*Wajib Diisi'
            }
          }
        },
        role: {
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
        url: ''.concat(baseUrl, 'data-users'),
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
    var user_id = $(this).data('id'),
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
          url: ''.concat(baseUrl, 'user-list/').concat(user_id),
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
