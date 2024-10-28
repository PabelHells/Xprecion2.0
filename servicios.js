import React, { useState } from 'react'
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { Textarea } from "@/components/ui/textarea"

export default function Component() {
  const [formData, setFormData] = useState({
    nombre: '',
    dia: '',
    mes: '',
    anio: '',
    celular: '',
    correoElectronico: '',
    direccion: ''
  })

  const handleChange = (e) => {
    const { name, value } = e.target
    setFormData(prevData => ({
      ...prevData,
      [name]: value
    }))
  }

  const handleSubmit = (e) => {
    e.preventDefault()
    console.log('Form submitted:', formData)
    // Here you would typically send the data to your backend
  }

  const generateDays = () => {
    const days = []
    for (let i = 1; i <= 31; i++) {
      days.push(<SelectItem key={i} value={i.toString()}>{i}</SelectItem>)
    }
    return days
  }

  const generateYears = () => {
    const years = []
    const currentYear = new Date().getFullYear()
    for (let i = currentYear; i >= currentYear - 100; i--) {
      years.push(<SelectItem key={i} value={i.toString()}>{i}</SelectItem>)
    }
    return years
  }

  return 
}