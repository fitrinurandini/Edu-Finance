<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Tampilkan semua data siswa
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Tampilkan form untuk tambah data siswa
    public function create()
    {
        return view('students.create');
    }

    // Simpan data siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:students',
            'nis' => 'required|unique:students',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Tampilkan form untuk edit data siswa
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update data siswa
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nisn' => 'required|unique:students,nisn,' . $student->id,
            'nis' => 'required|unique:students,nis,' . $student->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Hapus data siswa
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
