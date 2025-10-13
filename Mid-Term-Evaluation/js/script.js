document.addEventListener('DOMContentLoaded', () => {

  // Utilities
  const $ = sel => document.querySelector(sel);
  const $$ = sel => document.querySelectorAll(sel);

  // Year in footer
  const yearEl = document.getElementById('year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  /* -------------------------
     CUSTOMER DATA (localStorage)
     ------------------------- */
  const STORAGE_KEY = 'travel_customers_v1';
  
  const loadCustomers = () => {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      return raw ? JSON.parse(raw) : [];
    } catch(e) { 
      console.error('Error loading customers:', e);
      return []; 
    }
  };
  
  const saveCustomers = (arr) => {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(arr));
      return true;
    } catch(e) {
      console.error('Error saving customers:', e);
      return false;
    }
  };

  // Ubah warna header saat scroll
  window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 80) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
  });

  // Elements
  const form = document.getElementById('customerForm');
  const tableBody = document.querySelector('#customerTable tbody');

  console.log('Form found:', !!form);
  console.log('Table body found:', !!tableBody);

  // Render table
  function renderTable(){
    if (!tableBody) {
      console.log('Table body not found');
      return;
    }
    
    const data = loadCustomers();
    console.log('Data to render:', data);
    
    tableBody.innerHTML = '';
    
    if (data.length === 0) {
      const tr = document.createElement('tr');
      tr.innerHTML = `<td colspan="5" class="text-center text-muted">Belum ada data pelanggan.</td>`;
      tableBody.appendChild(tr);
      return;
    }
    
    data.forEach((c, idx) => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${escapeHtml(c.name)}</td>
        <td>${escapeHtml(c.phone)}</td>
        <td>${escapeHtml(c.origin)} → ${escapeHtml(c.destination)}</td>
        <td>${escapeHtml(c.service)}</td>
        <td>
          <button class="btn btn-sm btn-danger btn-delete" data-idx="${idx}" title="Hapus">
            <i class="bi bi-trash"></i>
          </button>
        </td>
      `;
      tableBody.appendChild(tr);
    });
  }

  // Escape HTML
  function escapeHtml(str = '') {
    return String(str).replace(/[&<>"'`=\/]/g, function (s) {
      return ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;', '/': '&#x2F;', '`': '&#x60;', '=': '&#x3D;'
      })[s];
    });
  }

  // Add customer
  if (form) {
    console.log('Adding form submit listener');
    
    form.addEventListener('submit', function(e){
      e.preventDefault();
      e.stopPropagation();
      
      console.log('Form submitted');
      
      // Get form values
      const name = document.getElementById('name');
      const phone = document.getElementById('phone');
      const origin = document.getElementById('origin');
      const destination = document.getElementById('destination');
      const service = document.getElementById('service');
      
      console.log('Form values:', {
        name: name?.value,
        phone: phone?.value,
        origin: origin?.value,
        destination: destination?.value,
        service: service?.value
      });
      
      // Validation
      if (!name || !phone || !origin || !destination || !service) {
        alert('Error: Form elements not found');
        return;
      }
      
      if (!name.value.trim() || !phone.value.trim() || !origin.value.trim() || !destination.value.trim() || !service.value) {
        alert('Harap isi semua field yang diperlukan');
        return;
      }
      
      const customer = {
        name: name.value.trim(),
        phone: phone.value.trim(),
        origin: origin.value.trim(),
        destination: destination.value.trim(),
        service: service.value,
        timestamp: new Date().toISOString()
      };
      
      console.log('New customer:', customer);
      
      const arr = loadCustomers();
      arr.push(customer);
      
      if (saveCustomers(arr)) {
        renderTable();
        form.reset();
        showToast('Data pelanggan berhasil disimpan!', 'success');
      } else {
        alert('Gagal menyimpan data');
      }
    });
  } else {
    console.log('Form not found');
  }

  // Delete row
  if (tableBody) {
    tableBody.addEventListener('click', (e) => {
      const btn = e.target.closest('.btn-delete');
      if (!btn) return;
      
      const idx = parseInt(btn.getAttribute('data-idx'));
      if (isNaN(idx)) return;
      
      if (!confirm('Yakin ingin menghapus data ini?')) return;
      
      let arr = loadCustomers();
      arr.splice(idx, 1);
      
      if (saveCustomers(arr)) {
        renderTable();
        showToast('Data pelanggan berhasil dihapus!', 'danger');
      } else {
        alert('Gagal menghapus data');
      }
    });
  }

  // Clear all
  const clearAllBtn = document.getElementById('clearAll');
  if (clearAllBtn) {
    clearAllBtn.addEventListener('click', () => {
      if (!confirm('Yakin ingin menghapus semua data pelanggan?')) return;
      
      localStorage.removeItem(STORAGE_KEY);
      renderTable();
      showToast('Semua data pelanggan berhasil dihapus!', 'warning');
    });
  }

  // Export CSV
  const exportBtn = document.getElementById('exportCsv');
  if (exportBtn) {
    exportBtn.addEventListener('click', () => {
      const data = loadCustomers();
      if (data.length === 0) {
        alert('Tidak ada data untuk diexport.');
        return;
      }
      
      const header = ['Nama','Telepon','Origin','Destination','Service'];
      const rows = data.map(r => [r.name, r.phone, r.origin, r.destination, r.service]);
      const csv = [header, ...rows].map(r => r.map(cell => `"${String(cell).replace(/"/g,'""')}"`).join(',')).join('\n');
      
      const blob = new Blob([csv], {type: 'text/csv;charset=utf-8;'});
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = `customers-${new Date().toISOString().split('T')[0]}.csv`;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      URL.revokeObjectURL(url);
      
      showToast('Data berhasil diexport!', 'success');
    });
  }

  // Quick contact form (kontak.html)
  const qc = document.getElementById('quickContact');
  if (qc) {
    qc.addEventListener('submit', (e) => {
      e.preventDefault();
      showToast('Terima kasih! Pesan akan kami tindak lanjuti.', 'success');
      qc.reset();
    });
  }

  // Toast notification function
  function showToast(message, type = 'info') {
    // Create toast element
    const toastEl = document.createElement('div');
    toastEl.className = `toast align-items-center text-white bg-${type} border-0 position-fixed bottom-0 end-0 m-3`;
    toastEl.setAttribute('role','alert');
    toastEl.innerHTML = `
      <div class="d-flex">
        <div class="toast-body">${message}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    `;
    
    // Add to page
    document.body.appendChild(toastEl);
    
    // Show with Bootstrap if available
    if (window.bootstrap && bootstrap.Toast) {
      const t = new bootstrap.Toast(toastEl);
      t.show();
      toastEl.addEventListener('hidden.bs.toast', () => toastEl.remove());
    } else {
      // Fallback for non-Bootstrap environments
      toastEl.classList.add('show');
      setTimeout(() => {
        toastEl.remove();
      }, 3000);
    }
  }

  // Initial render
  renderTable();

  // Small helper: mark active nav link based on current path
  (function markActiveNav(){
    const links = document.querySelectorAll('.navbar .nav-link');
    if (!links) return;
    const path = window.location.pathname.split('/').pop();
    links.forEach(a => {
      const href = a.getAttribute('href');
      if (href === path || (href === 'index.html' && (path === '' || path === 'index.html'))) {
        a.classList.add('active');
      }
    });
  })();

});
