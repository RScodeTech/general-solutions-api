<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>General Solutions — Cadastro de Técnico</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Lucide (ícones) -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="../public/style.css">
</head>
<body>

  <!-- Top / Brand -->
  <div class="gs-nav py-3">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="gs-brand">
        <div class="logo">GS</div>
        <div>General Solutions</div>
      </div>
      <div class="d-none d-md-flex align-items-center gap-3">
        <span class="opacity-75">Marketplace de Serviços</span>
      </div>
    </div>
  </div>

  <div class="container my-5" style="max-width:980px">
    <div class="card gs-card">
      <!-- Stepper mini (sem Documentos; Serviços -> Profissões) -->
      <div class="stepper">
        <div class="step" data-active="true"><i data-lucide="user"></i> Dados</div>
        <div class="step"><i data-lucide="map-pin"></i> Localização</div>
        <div class="step"><i data-lucide="briefcase"></i> Profissões</div>
      </div>

      <div class="card-body p-4 p-lg-5">

        <!-- Alertas -->
        <div id="alertBox" class="alert d-none" role="alert"></div>

        <form id="technicianForm" enctype="multipart/form-data" novalidate>

          <!-- Service area info -->
          <div class="p-3 mb-4 border rounded bg-light">
            <h6 class="mb-1 d-flex align-items-center">
              <i data-lucide="map-pin" class="me-2"></i>
              Service Area
            </h6>
            <p class="mb-0 text-muted">
              Your service area will be defined as a <strong>20-mile radius</strong> from the address you provide.
            </p>
          </div>
        
          <!-- Personal Data -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="user"></i> Personal Information</span>
          </div>
          <div class="row g-3 mb-2">
            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="user-round"></i></span>
                <input type="text" class="form-control" name="name" required placeholder="e.g., Maria Silva" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="phone"></i></span>
                <input type="text" class="form-control" name="fone" required placeholder="(XXX) 90000-0000" />
              </div>
            </div>
          </div>
        
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="mail"></i></span>
                <input type="email" class="form-control" name="email" required placeholder="email@example.com" />
              </div>
            </div>
          </div>
        
          <!-- Location -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="map-pin"></i> Location</span>
          </div>
          <div class="row g-3 mb-2">
            <div class="col-md-6">
              <label class="form-label">State</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="map"></i></span>
                <input type="text" class="form-control" name="state" required placeholder="e.g., FL" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">City</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="building-2"></i></span>
                <input type="text" class="form-control" name="city" required placeholder="e.g., Orlando" />
              </div>
            </div>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Address</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="home"></i></span>
                <input type="text" class="form-control" name="address" required placeholder="Street, number" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Complement</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="sticky-note"></i></span>
                <input type="text" class="form-control" name="complement" placeholder="Apt, block, ref." />
              </div>
            </div>
          </div>
        
          <!-- Details -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="file-text"></i> Details</span>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-12">
              <label class="form-label">Services Provided</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Describe your specialties, certifications, and experience."></textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label">Profile Image</label>
              <input type="file" class="form-control" name="image" accept="image/*" />
              <div class="help mt-1">PNG/JPG up to 5MB.</div>
            </div>
          </div>
        
          <!-- Professions -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="briefcase"></i> Professions</span>
          </div>
          <p class="text-muted mb-2">Select up to <strong>3</strong> professions.</p>
        
          <div id="professions-container" class="row row-cols-1 row-cols-md-2 g-2">
        
            <!-- General Services -->
            <div class="col-12"><strong>General Services</strong></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Handyman" id="prof-handyman"> <label for="prof-handyman">Handyman</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="General Contractor" id="prof-contractor"> <label for="prof-contractor">General Contractor</label></div>
        
            <!-- Structure & Building -->
            <div class="col-12 mt-2"><strong>Structure & Building</strong></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Carpenter" id="prof-carpenter"> <label for="prof-carpenter">Carpenter</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Mason" id="prof-mason"> <label for="prof-mason">Mason</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Roofer" id="prof-roofer"> <label for="prof-roofer">Roofer</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Drywall Installer / Finisher" id="prof-drywall"> <label for="prof-drywall">Drywall Installer / Finisher</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Concrete Worker" id="prof-concrete"> <label for="prof-concrete">Concrete Worker</label></div>
        
            <!-- Electrical & Plumbing -->
            <div class="col-12 mt-2"><strong>Electrical & Plumbing</strong></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Electrician" id="prof-electrician"> <label for="prof-electrician">Electrician</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Plumber" id="prof-plumber"> <label for="prof-plumber">Plumber</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="HVAC Technician" id="prof-hvac"> <label for="prof-hvac">HVAC Technician</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Gas Technician" id="prof-gas"> <label for="prof-gas">Gas Technician</label></div>
        
            <!-- Finishing & Remodeling -->
            <div class="col-12 mt-2"><strong>Finishing & Remodeling</strong></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Painter" id="prof-painter"> <label for="prof-painter">Painter</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Flooring Installer" id="prof-flooring"> <label for="prof-flooring">Flooring Installer</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Tile Installer" id="prof-tile"> <label for="prof-tile">Tile Installer</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Cabinet Maker / Installer" id="prof-cabinet"> <label for="prof-cabinet">Cabinet Maker / Installer</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Window & Door Installer" id="prof-window"> <label for="prof-window">Window & Door Installer</label></div>
        
            <!-- Outdoor Services -->
            <div class="col-12 mt-2"><strong>Outdoor Services</strong></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Landscaper" id="prof-landscaper"> <label for="prof-landscaper">Landscaper</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Fence Installer" id="prof-fence"> <label for="prof-fence">Fence Installer</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Deck Builder" id="prof-deck"> <label for="prof-deck">Deck Builder</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Pool Technician" id="prof-pool"> <label for="prof-pool">Pool Technician</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Paver / Driveway Installer" id="prof-paver"> <label for="prof-paver">Paver / Driveway Installer</label></div>
        
            <!-- Specialized Services -->
            <div class="col-12 mt-2"><strong>Specialized Services</strong></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Demolition Worker" id="prof-demolition"> <label for="prof-demolition">Demolition Worker</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Excavator Operator" id="prof-excavator"> <label for="prof-excavator">Excavator Operator</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Welder" id="prof-welder"> <label for="prof-welder">Welder</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Insulation Installer" id="prof-insulation"> <label for="prof-insulation">Insulation Installer</label></div>
            <div class="col"><input class="form-check-input profession-check" type="checkbox" value="Solar Panel Installer" id="prof-solar"> <label for="prof-solar">Solar Panel Installer</label></div>
        
          </div>
          <div class="d-flex align-items-center justify-content-between mt-4">
            <p class="footer-note m-0"><i data-lucide="lock"></i> Your data is transmitted securely.</p>
            <button id="submitBtn" type="submit" class="btn btn-primary btn-lg rounded-pill px-4">
              <span class="spinner-border spinner-border-sm me-2 d-none" id="btnSpinner" aria-hidden="true"></span>
              Submit Registration
            </button>
          </div>
        </form>
        
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index:1080">
    <div id="gsToast" class="toast align-items-center text-bg-dark border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="gsToastBody">Processando…</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Fechar"></button>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // ---- Config ----
  const API_URL = 'https://www.generalsolutionsclub.com/api/technicians';

  const form = document.getElementById('technicianForm');
  const alertBox = document.getElementById('alertBox');
  const submitBtn = document.getElementById('submitBtn');
  const btnSpinner = document.getElementById('btnSpinner');

  // Toast helper
  const toastEl = document.getElementById('gsToast');
  const toastBody = document.getElementById('gsToastBody');
  const toast = new bootstrap.Toast(toastEl);

  // Lucide
  document.addEventListener('DOMContentLoaded', () => { lucide.createIcons(); });

  // Small CSS.escape fallback (older browsers)
  if (typeof CSS === 'undefined' || typeof CSS.escape !== 'function') {
    window.CSS = window.CSS || {};
    CSS.escape = function (s) {
      return String(s).replace(/[^a-zA-Z0-9_\-]/g, '\\$&');
    };
  }

  // ---- UI helpers ----
  function setLoading(loading){
    submitBtn.disabled = loading;
    btnSpinner.classList.toggle('d-none', !loading);
  }

  function showAlert(type, html){
    alertBox.className = `alert alert-${type}`;
    alertBox.innerHTML = html;           // accepts HTML (for list of errors)
    alertBox.classList.remove('d-none');
  }

  function showToast(message){
    toastBody.textContent = message;
    toast.show();
  }

  function clearFieldErrors(){
    // Remove previous field states/feedback
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    form.querySelectorAll('.invalid-feedback[data-auto]').forEach(el => el.remove());
  }

  function setFieldError(fieldName, message){
    // Try by [name="field"]
    let el = form.querySelector(`[name="${CSS.escape(fieldName)}"]`);

    // Common fallback mapping (adjust if your API uses other keys)
    if (!el && fieldName === 'phone') el = form.querySelector('[name="fone"]');

    if (el) {
      el.classList.add('is-invalid');
      // If there's already a feedback under the same input-group, reuse it; otherwise create one
      let fb = el.parentElement.querySelector('.invalid-feedback');
      if (!fb) {
        fb = document.createElement('div');
        fb.className = 'invalid-feedback';
        fb.setAttribute('data-auto', ''); // mark to clear later
        el.parentElement.appendChild(fb);
      }
      fb.textContent = String(message);
    }
  }

  // ---- Professions limit (max 3) ----
  const MAX_PROF = 3;
  const checks = document.querySelectorAll('.profession-check');
  checks.forEach(chk => {
    chk.addEventListener('change', () => {
      const selected = document.querySelectorAll('.profession-check:checked');
      if (selected.length > MAX_PROF) {
        chk.checked = false; // undo the last one
        showToast(`You can select up to ${MAX_PROF} professions.`);
      }
    });
  });

  // ---- Submit handler ----
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    alertBox.classList.add('d-none');
    clearFieldErrors();

    if (!form.checkValidity()){
      form.reportValidity();
      return;
    }

    // normalize decimal with comma -> dot if you ever add distance field
    const distance = form.querySelector('[name="distance"]');
    if (distance && distance.value) distance.value = distance.value.replace(',', '.');

    const selectedProfs = Array.from(document.querySelectorAll('.profession-check:checked')).map(i => i.value);
    if (selectedProfs.length === 0) {
      showAlert('warning', 'Please select at least one profession.');
      return;
    }

    // Build FormData; convert professions -> services[i][name]
    const formData = new FormData(form);

    // remove any preexisting services[*][name] keys to avoid duplicates
    const toDelete = [];
    for (const [k] of formData.entries()) {
      if (k.startsWith('services[') && k.endsWith('][name]')) toDelete.push(k);
    }
    toDelete.forEach(k => formData.delete(k));

    selectedProfs.slice(0, MAX_PROF).forEach((prof, idx) => {
      formData.append(`services[${idx}][name]`, prof);
    });

    try{
      setLoading(true);
      showToast('Submitting registration…');

      const resp = await fetch(API_URL, { method:'POST', body: formData });
      const contentType = resp.headers.get('content-type') || '';
      const payload = contentType.includes('application/json')
        ? await resp.json().catch(()=> ({}))
        : await resp.text();

      if (!resp.ok) {
        let backendMsg = 'Unable to complete the registration.';
        let fieldErrors = null;

        if (typeof payload === 'object' && payload !== null) {
          backendMsg = payload.message || backendMsg;
          // Some backends nest errors under data.errors
          fieldErrors = payload.errors || (payload.data && payload.data.errors) || null;
        } else if (typeof payload === 'string' && payload.trim()) {
          backendMsg = payload;
        }

        if (fieldErrors && typeof fieldErrors === 'object') {
          const items = [];
          Object.entries(fieldErrors).forEach(([field, msgs]) => {
            const first = Array.isArray(msgs) ? msgs[0] : String(msgs);
            setFieldError(field, first);
            items.push(`<li><strong>${field}</strong>: ${first}</li>`);
          });

          const html =
            `<div class="fw-semibold mb-1">${backendMsg}</div>` +
            `<ul class="mb-0 ps-3">${items.join('')}</ul>`;

          showAlert('danger', html);
          showToast('Validation error. Check the highlighted fields.');
        } else {
          showAlert('danger', backendMsg);
          showToast(backendMsg);
        }

        // throw to enter catch (keeps flow consistent)
        throw new Error(backendMsg);
      }

      // Success
      showAlert('success', 'Registration completed successfully!');
      showToast('All good! Technician registered.');
      form.reset();

    } catch (err) {
      console.error(err);
      // If no specific alert was shown yet (e.g., network error), show a generic one
      if (alertBox.classList.contains('d-none')) {
        showAlert('danger', 'Error while sending: ' + (err.message || 'Unexpected failure.'));
      }
      showToast('Submission failed. Please try again.');
    } finally {
      setLoading(false);
      lucide.createIcons(); // re-render icons if DOM changed
    }
  });
</script>

</body>
</html>
