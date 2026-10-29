import React, { useState } from 'react'; //  Benar

import axios from 'axios';

const FormCariKelas = ({ action, onSearchResult }) => {
    const [kata, setKata] = useState('');

    const handleCari = async(e, page = 1) => {
        if (e) e.preventDefault();
        
        try {
            const Response = await axios.get(action, {
                params: {cari: kata,page: page}
            }
            );
            if (onSearchResult){
                onSearchResult(Response.data);
            }
        }
        catch (error){
            console.error("Gagal mengambil data dari server:", error);
        }
    }
    React.useEffect(()=>{
        window.triggerReactSearch = (page) => handleCari(null,page);
    }, [kata])
    return (
        <form style={{ marginLeft: '16px' }} onSubmit={handleCari} method="GET">
            <input style={{ width:'93.5%' }} type="text" name="cari" placeholder="Cari Kelas berdasarkan nama, periode, tanggal dan pengajar..." value={kata}
                onChange={(e) => setKata(e.target.value)} />
            <input style={{ width: '60px', height: '30px', borderRadius: '3px', background: '#fde047', border:'none' }} type="submit" value="Cari"/>
        </form>
    );
}

export default FormCariKelas;
