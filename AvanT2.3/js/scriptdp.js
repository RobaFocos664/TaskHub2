const organizationData = [
    {
        code: "PROD",
        name: "Producción",
        manager: "Juan Pérez",
        areas: [
            {
                code: "MACH",
                name: "Maquinado",
                teams: [
                    {
                        name: "Equipo A1",
                        leader: "María López",
                        members: [
                            { name: "Carlos Rodríguez", position: "Operador de Torno" },
                            { name: "Ana Martínez", position: "Operador de Fresadora" },
                        ]
                    }
                ]
            },
            {
                code: "ASSM",
                name: "Ensamblaje",
                teams: [
                    {
                        name: "Equipo A2",
                        leader: "Carlos Rodríguez",
                        members: [
                            { name: "Laura Sánchez", position: "Ensamblador Senior" },
                            { name: "Pedro Gómez", position: "Ensamblador Junior" },
                        ]
                    }
                ]
            }
        ]
    },
    {
        "code": "RRHH",
        "name": "Recursos Humanos",
        "manager": "Brian Becerra",
        "areas": [
            {
                "code": "RESEL",
                "name": "Reclutamiento y Selección",
                "teams": [
                    {
                        "name": "Equipo A1",
                        "leader": "Sofía Morales",
                        "members": [
                            { "name": "Fernando Torres", "position": "Reclutador" },
                            { "name": "Claudia Pérez", "position": "Asistente de Reclutamiento" }
                        ]
                    }
                ]
            },
            {
                "code": "CUMNO",
                "name": "Cumplimiento Normativo",
                "teams": [
                    {
                        "name": "Equipo A2",
                        "leader": "Javier Silva",
                        "members": [
                            { "name": "Isabel Castro", "position": "Analista de Cumplimiento" },
                            { "name": "Ricardo López", "position": "Coordinador de Políticas" }
                        ]
                    }
                ]
            }
        ]
    },
    
    {
        code: "SALES",
        name: "Ventas",
        manager: "Ana García",
        areas: [
            {
                code: "DOM",
                name: "Ventas Nacionales",
                teams: [
                    {
                        name: "Equipo A1",
                        leader: "Luis Fernández",
                        members: [
                            { name: "Sofía Ruiz", position: "Representante de Ventas" },
                            { name: "Diego Torres", position: "Asistente de Ventas" },
                        ]
                    }
                ]
            },
            {
                code: "INT",
                name: "Ventas Internacionales",
                teams: [
                    {
                        name: "Equipo A2",
                        leader: "Elena Morales",
                        members: [
                            { name: "Javier López", position: "Gerente de Cuentas Internacionales" },
                            { name: "Isabel Navarro", position: "Especialista en Exportaciones" },
                        ]
                    }
                ]
            }
        ]
    },
    {
        "code": "TI",
        "name": "Tecnología de la Información",
        "manager": "Carlos Pérez",
        "areas": [
            {
                "code": "DES",
                "name": "Desarrollo de Software",
                "teams": [
                    {
                        "name": "Equipo A1",
                        "leader": "María Gómez",
                        "members": [
                            { "name": "Ana Torres", "position": "Desarrolladora Frontend" },
                            { "name": "Luis Ramírez", "position": "Desarrollador Backend" }
                        ]
                    }
                ]
            },
            {
                "code": "SUP",
                "name": "Soporte Técnico",
                "teams": [
                    {
                        "name": "Equipo A2",
                        "leader": "Pedro Sánchez",
                        "members": [
                            { "name": "Clara Díaz", "position": "Técnico de Soporte" },
                            { "name": "Fernando Ruiz", "position": "Especialista en Redes" }
                        ]
                    }
                ]
            }
        ]
    }
];
// Genera los enlaces de departamento y estructura interna
function createDepartmentCard(department) {
    const card = document.createElement('div');
    card.className = 'card';
    card.id = `dept-${department.code}`;
    card.innerHTML = `
        <div class="card-header">
            <h2 class="card-title">
                <a href="#dept-${department.code}">
                    <i data-lucide="building-2" class="icon icon-blue"></i>
                    ${department.name}
                </a>
            </h2>
        </div>
        <div class="card-content">
            <p class="card-description">Código: ${department.code} | Gerente: ${department.manager}</p>
            <div class="space-y-6">
                ${department.areas.map(area => createAreaCard(area, department.code)).join('')}
            </div>
        </div>
    `;
    return card;
}

function createAreaCard(area, deptCode) {
    return `
        <div class="card area-card" id="area-${deptCode}-${area.code}">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="#area-${deptCode}-${area.code}">
                        <i data-lucide="briefcase" class="icon icon-indigo"></i>
                        ${area.name}
                    </a>
                </h3>
            </div>
            <div class="card-content">
                <p class="card-description">Código: ${area.code}</p>
                <div class="space-y-6">
                    ${area.teams.map(team => createTeamCard(team, deptCode, area.code)).join('')}
                </div>
            </div>
        </div>
    `;
}

function createTeamCard(team, deptCode, areaCode) {
    return `
        <div class="card team-card" id="team-${deptCode}-${areaCode}-${team.name.replace(/\s+/g, '')}">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="#team-${deptCode}-${areaCode}-${team.name.replace(/\s+/g, '')}">
                        <i data-lucide="users" class="icon icon-green"></i>
                        ${team.name}
                    </a>
                </h4>
            </div>
            <div class="card-content">
                <p class="card-description">Líder: ${team.leader} | Miembros: ${team.members.length}</p>
                <div class="space-y-2">
                    ${team.members.map(member => `
                        <div class="team-member">
                            <span>${member.name}</span>
                            <span class="badge">${member.position}</span>
                        </div>
                    `).join('')}
                </div>
            </div>
        </div>
    `;
}

function renderOrganizationStructure() {
    const container = document.getElementById('organization-structure');
    organizationData.forEach(department => {
        container.appendChild(createDepartmentCard(department));
    });

    // iconos de Lucide
    lucide.createIcons();
}

// Renderizar la estructura cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', renderOrganizationStructure);




