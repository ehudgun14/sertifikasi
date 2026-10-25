import './bootstrap';
import React, { useState } from 'react'; // Pastikan { useState } ada di sini

import { createRoot } from 'react-dom/client';
import FormCari from './components/FormCari';

function HalamanCari(){
    const container = document.getElementById('halamancari');
    if (!container) return null;
    const aksiUrl = container.getAttribute('data-action');
    const dataAwal = JSON.parse(container.getAttribute('data-awal')) || { data: [] };
    const [sertifikat, setSertifikat] = useState(dataAwal.data || []);

    const [halaman, setHalaman] = useState({
        halaman_terkini: dataAwal.current_page || 1,
        halaman_terakhir: dataAwal.last_page || 1,
        halaman_belakang_url: dataAwal.prev_page_url,
        halaman_depan_url: dataAwal.next_page_url,
    });

    const pindahHalaman = (nomorHalaman) => {
        if (window.triggerReactSearch){
            window.triggerReactSearch(nomorHalaman);
        }
    }
    return(
        <div className="container mt-5">
            <div className="row">
                <div className="col-md-12">
                     <div className="card border-0 shadow-sm rounded bg-gray-100 divide-gray-200">
                        <div className="card-header">
                            <FormCari action={aksiUrl} onSearchResult={(ResponseLaravel) => {
                                setSertifikat(ResponseLaravel.data || []);
                                setHalaman({
                                    halaman_terkini: ResponseLaravel.current_page || 1,
                                    halaman_terakhir: ResponseLaravel.last_page || 1,
                                    halaman_belakang_url: ResponseLaravel.prev_page_url,
                                    halaman_depan_url: ResponseLaravel.next_page_url,
                                });

                            }} ></FormCari>
                        </div>
                         <div className="card-body">
                            <table className='table table-bordered bg-light'>
                                <thead>
                                    <tr>
                                    <th>File</th>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Tanggal</th>
                                    <th>Aktifitas</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    {
                                        sertifikat.length > 0 ? (
                                            sertifikat.map((row) => (
                                                <tr className="tabelcetak"  key={row.id}>
                                                    <td><a href={"/files/${row.certname}"} className="text-blue-500">{ row.certname }</a></td>
                                                    <td>{ row.nrp }</td>
                                                    <td>{ row.studentname }</td>
                                                    <td>{ row.kelasname }</td>
                                                    <td>{ row.tanggal } </td>
                                                    <td>{ row.aktifitas }</td>
                                                </tr>
                                            )
                                        )) : (
                                             <tr>

                                             </tr>
                                        )
                                    }
                                </tbody>
                            </table>

                            
                                <nav aria-label="Halaman">
                                    <ul className="pagination justify-content-center">
                                        <li className={`page-item ${!halaman.halaman_belakang_url ? 'disabled' : ''}`}>
                                            <button className="page-link" onClick={() => pindahHalaman(halaman.halaman_terkini - 1)}>
                                                Previous
                                            </button>
                                        </li>

                                        {Array.from({ length: halaman.halaman_terakhir }, (_, index) => {
                                            const halaman = index + 1;
                                            return (
                                                <li key={halaman} className={`page-item ${halaman.halaman_terkini === halaman ? 'active' : ''}`}>
                                                    <button className="page-link" onClick={() => pindahHalaman(halaman)}>
                                                        {halaman}
                                                    </button>
                                                </li>
                                            );
                                        })}

                                        <li className={`page-item ${!halaman.halaman_depan_url ? 'disabled' : ''}`}>
                                            <button className="page-link" onClick={() => pindahHalaman(halaman.halaman_terkini + 1)}>
                                                Next
                                            </button>
                                        </li>
                                    </ul>
                                </nav>
                        
                         </div>
                     </div>
                     
                </div>
            </div>
        </div>
    );
}
/* function App() {
    const FormCariElement = document.getElementById('formcari');
    if (FormCari) {
        const cariUrl = FormCariElement.getAttribute('data-action');
        const cariVal = FormCariElement.getAttribute('data-value') || '';
        
        createRoot(FormCariElement).render(
            <React.StrictMode>
                <FormCari action={cariUrl} defaultValue={cariVal} ></FormCari>
            </React.StrictMode>
        )
    }

} */

const target = document.getElementById('halamancari');
if (target) {
    createRoot(target).render(
        <React.StrictMode>
            <HalamanCari />
        </React.StrictMode>
    );
}