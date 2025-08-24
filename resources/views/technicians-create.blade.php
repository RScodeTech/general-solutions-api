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
  <link rel="stylesheet" href="../style.css">


   
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
      <!-- Stepper mini -->
      <div class="stepper">
        <div class="step" data-active="true"><i data-lucide="user"></i> Dados</div>
        <div class="step"><i data-lucide="map-pin"></i> Localização</div>
        <div class="step"><i data-lucide="id-card"></i> Documentos</div>
        <div class="step"><i data-lucide="settings-2"></i> Serviços</div>
      </div>

      <div class="card-body p-4 p-lg-5">
        <!-- Alertas -->
        <div id="alertBox" class="alert d-none" role="alert"></div>

        <form id="technicianForm" enctype="multipart/form-data" novalidate>
          <!-- Dados Pessoais -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="user"></i> Dados Pessoais</span>
          </div>
          <div class="row g-3 mb-2">
            <div class="col-md-6">
              <label class="form-label">Nome Completo</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="user-round"></i></span>
                <input type="text" class="form-control" name="name" required placeholder="Ex.: Maria Silva" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Telefone</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="phone"></i></span>
                <input type="text" class="form-control" name="fone" required placeholder="(DDD) 90000-0000" />
              </div>
            </div>
          </div>

          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="mail"></i></span>
                <input type="email" class="form-control" name="email" required placeholder="email@exemplo.com" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label d-flex align-items-center gap-2">Distância <span class="help">(km)</span></label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="route"></i></span>
                <input type="number" step="0.01" class="form-control" name="distance" placeholder="Ex.: 25" />
              </div>
            </div>
          </div>

          <!-- Localização -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="map-pin"></i> Localização</span>
          </div>
          <div class="row g-3 mb-2">
            <div class="col-md-6">
              <label class="form-label">Estado</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="map"></i></span>
                <input type="text" class="form-control" name="state" required placeholder="Ex.: FL" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Cidade</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="building-2"></i></span>
                <input type="text" class="form-control" name="city" required placeholder="Ex.: Orlando" />
              </div>
            </div>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label">Endereço</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="home"></i></span>
                <input type="text" class="form-control" name="address" required placeholder="Rua, número" />
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Complemento</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="sticky-note"></i></span>
                <input type="text" class="form-control" name="complement" placeholder="Apto, bloco, ref." />
              </div>
            </div>
          </div>

          <!-- Documentos -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="id-card"></i> Documentos</span>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-md-4">
              <label class="form-label">SSN</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="shield"></i></span>
                <input type="text" class="form-control" name="ssn" placeholder="XXX-XX-XXXX" />
              </div>
            </div>
            <div class="col-md-4">
              <label class="form-label">DMV</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="car"></i></span>
                <input type="text" class="form-control" name="dmv" placeholder="Registro/License" />
              </div>
            </div>
            <div class="col-md-4">
              <label class="form-label">State ID</label>
              <div class="input-group">
                <span class="input-group-text"><i data-lucide="badge-check"></i></span>
                <input type="text" class="form-control" name="state_id" placeholder="Identificação estadual" />
              </div>
            </div>
          </div>

          <!-- Detalhes -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="file-text"></i> Detalhes</span>
          </div>
          <div class="row g-3 mb-4">
            <div class="col-12">
              <label class="form-label">Descrição</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Conte um pouco sobre suas especialidades, certificações, alcance etc."></textarea>
              <div class="help mt-1">Dica: destaque serviços, anos de experiência e cidades atendidas.</div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Imagem</label>
              <input type="file" class="form-control" name="image" accept="image/*" />
              <div class="help mt-1">PNG/JPG até 5MB.</div>
            </div>
          </div>

          <!-- Serviços -->
          <div class="d-flex align-items-center gap-2 section-title">
            <span class="badge rounded-pill"><i data-lucide="wrench"></i> Serviços</span>
          </div>

          <div id="servicos-container" class="mb-2">
            <div class="row g-2 align-items-center service-row">
              <div class="col-md-11">
                <div class="service-pill">
                  <input type="text" class="form-control border-0" name="services[0][name]" placeholder="Ex.: Encanamento, Eletricista, Limpeza pós-obra" />
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2 mb-4">
            <button type="button" id="add-servico" class="btn btn-outline-secondary">
              <i data-lucide="plus"></i> Adicionar Serviço
            </button>
          </div>

          <!-- Ações -->
          <div class="d-flex align-items-center justify-content-between">
            <p class="footer-note m-0"><i data-lucide="lock"></i> Seus dados são enviados com segurança.</p>
            <button id="submitBtn" type="submit" class="btn btn-primary btn-lg rounded-pill px-4">
              <span class="spinner-border spinner-border-sm me-2 d-none" id="btnSpinner" aria-hidden="true"></span>
              Enviar cadastro
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
    const API_URL = 'https://bioemfoco.com/api/technicians';

    const form = document.getElementById('technicianForm');
    const alertBox = document.getElementById('alertBox');
    const submitBtn = document.getElementById('submitBtn');
    const btnSpinner = document.getElementById('btnSpinner');
    const servicesContainer = document.getElementById('servicos-container');

    // Toast helper
    const toastEl = document.getElementById('gsToast');
    const toastBody = document.getElementById('gsToastBody');
    const toast = new bootstrap.Toast(toastEl);

    // Lucide
    document.addEventListener('DOMContentLoaded', () => { lucide.createIcons(); });

    // Add/Remove Serviço
    let serviceIndex = 1;
    document.getElementById('add-servico').addEventListener('click', () => {
      const row = document.createElement('div');
      row.className = 'row g-2 align-items-center service-row mt-2';
      row.innerHTML = `
        <div class="col-md-11">
          <div class="service-pill d-flex align-items-center gap-2">
            <input type="text" class="form-control border-0" name="services[${serviceIndex}][name]" placeholder="Nome do Serviço" />
          </div>
        </div>
        <div class="col-md-1 d-flex justify-content-end">
          <button type="button" class="btn btn-outline-danger btn-sm rounded-pill remove-servico">
            <i data-lucide="x"></i>
          </button>
        </div>`;
      servicesContainer.appendChild(row);
      serviceIndex++;
      lucide.createIcons(); // re-render ícones adicionados dinamicamente
    });

    servicesContainer.addEventListener('click', (e) => {
      if (e.target.closest('.remove-servico')) {
        e.target.closest('.service-row').remove();
      }
    });

    function setLoading(loading){
      submitBtn.disabled = loading;
      btnSpinner.classList.toggle('d-none', !loading);
    }

    function showAlert(type, message){
      alertBox.className = `alert alert-${type}`;
      alertBox.textContent = message;
      alertBox.classList.remove('d-none');
    }

    function showToast(message){
      toastBody.textContent = message;
      toast.show();
    }

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      alertBox.classList.add('d-none');

      if(!form.checkValidity()){
        form.reportValidity();
        return;
      }

      // normaliza decimal com vírgula
      const distance = form.querySelector('[name="distance"]');
      if (distance && distance.value) distance.value = distance.value.replace(',', '.');

      const formData = new FormData(form);

      try{
        setLoading(true);
        showToast('Enviando cadastro…');

        const resp = await fetch(API_URL, { method:'POST', body: formData });
        const contentType = resp.headers.get('content-type') || '';
        const payload = contentType.includes('application/json')
          ? await resp.json().catch(()=> ({}))
          : await resp.text();

        if(!resp.ok){
          const msg = typeof payload === 'string' ? payload : (payload.message || 'Não foi possível concluir o cadastro.');
          throw new Error(msg);
        }

        showAlert('success', 'Cadastro realizado com sucesso!');
        showToast('Tudo certo! Técnico cadastrado.');
        form.reset();

        // reseta serviços
        servicesContainer.innerHTML = `
          <div class="row g-2 align-items-center service-row">
            <div class="col-md-11">
              <div class="service-pill">
                <input type="text" class="form-control border-0" name="services[0][name]" placeholder="Ex.: Encanamento, Eletricista, Limpeza pós-obra" />
              </div>
            </div>
          </div>`;
        serviceIndex = 1;

      }catch(err){
        console.error(err);
        showAlert('danger', 'Erro ao enviar: ' + err.message);
        showToast('Erro no envio. Verifique os campos.');
      }finally{
        setLoading(false);
        lucide.createIcons();
      }
    });
  </script>
</body>
</html>
